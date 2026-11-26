<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['type', 'name', 'email', 'mobile', 'child_name', 'class_applying', 'current_school', 'visit_at', 'visitors', 'position', 'experience', 'resume_path', 'subject', 'message', 'source'])]
class Inquiry extends Model
{
    use SoftDeletes;

    /** Form types => tab name (also the Google Sheet tab name). */
    public const TYPES = [
        'enquire' => 'Enquire Now',
        'visit' => 'Book a Visit',
        'career' => 'Career Applications',
        'contact' => 'Contact Messages',
        'notify' => 'Notify Me',
    ];

    /** Label of every field (used on the detail page and as the Google Sheet column titles). */
    public const LABELS = [
        'name' => 'Name',
        'mobile' => 'Mobile',
        'email' => 'Email',
        'child_name' => "Child's name",
        'class_applying' => 'Class applying for',
        'current_school' => 'Current school',
        'visit_at' => 'Preferred visit date',
        'visitors' => 'Visitors',
        'position' => 'Area of interest',
        'experience' => 'Experience',
        'subject' => 'Subject',
        'message' => 'Message',
        'source' => 'Source',
    ];

    /** Fields shown in the list and the Google Sheet for each form type. */
    public const COLUMNS = [
        'enquire' => ['name', 'mobile', 'email', 'child_name', 'class_applying', 'current_school', 'visit_at', 'message', 'source'],
        'visit' => ['name', 'mobile', 'email', 'visit_at', 'visitors'],
        'career' => ['name', 'mobile', 'email', 'position', 'experience'],
        'contact' => ['name', 'mobile', 'email', 'subject', 'message'],
        'notify' => ['name', 'mobile', 'email', 'child_name', 'class_applying', 'source'],
    ];

    protected function casts(): array
    {
        return ['visit_at' => 'datetime'];
    }

    public function typeLabel(): string
    {
        return self::TYPES[$this->type] ?? $this->type;
    }

    /** Value of a field as plain text (dates formatted, empty => empty string). */
    public function display(string $field): string
    {
        $value = $this->{$field};

        if ($field === 'visit_at' && $value) {
            // A date picked without a time is stored as 00:00, so only show the time when there is one.
            return $value->format($value->format('H:i') === '00:00' ? 'd M Y' : 'd M Y, h:i A');
        }

        return (string) ($value ?? '');
    }
}
