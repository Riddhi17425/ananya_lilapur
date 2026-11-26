<?php

namespace App\Support;

class Html
{
    /** Keep only safe formatting tags from editor (Summernote) content. Returns '' when there is no text. */
    public static function clean(?string $html): string
    {
        $html = strip_tags((string) $html, '<p><br><b><strong><i><em><u><ul><ol><li><a>');
        $html = preg_replace('/\s(on\w+|style)\s*=\s*("[^"]*"|\'[^\']*\'|[^\s>]*)/i', '', $html);
        $html = preg_replace('/href\s*=\s*["\']?\s*javascript:[^"\'>\s]*["\']?/i', '', $html);
        $hasText = trim(html_entity_decode(strip_tags($html), ENT_QUOTES | ENT_HTML5)) !== '';

        return $hasText ? $html : '';
    }
}
