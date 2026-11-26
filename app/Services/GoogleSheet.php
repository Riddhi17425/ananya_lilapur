<?php

namespace App\Services;

use App\Models\Inquiry;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

/**
 * Adds an inquiry as a new row in a Google Sheet (one tab per form type).
 *
 * It calls a small Google Apps Script web app (see docs/google-sheet-setup.md).
 * Nothing happens when GOOGLE_SHEET_URL is empty, and a failure is only logged,
 * so the visitor's submission is never lost or blocked.
 */
class GoogleSheet
{
    public static function append(Inquiry $inquiry): void
    {
        try {
            $url = config('services.google_sheet.url');

            if (! $url) {
                return;
            }

            $fields = Inquiry::COLUMNS[$inquiry->type];

            Http::timeout(10)->post($url, [
                'secret' => config('services.google_sheet.secret'),
                'sheet' => $inquiry->typeLabel(),
                'headers' => array_merge(['Submitted at'], array_map(fn ($f) => Inquiry::LABELS[$f], $fields), $inquiry->resume_path ? ['Résumé'] : []),
                'row' => array_merge(
                    [$inquiry->created_at->format('d M Y, h:i A')],
                    array_map(fn ($f) => $inquiry->display($f), $fields),
                    $inquiry->resume_path ? [route('admin.inquiries.resume', $inquiry)] : [],
                ),
            ])->throw();
        } catch (Throwable $e) {
            Log::warning('Could not add inquiry #'.$inquiry->id.' to Google Sheet: '.$e->getMessage());
        }
    }
}
