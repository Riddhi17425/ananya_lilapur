<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

/** One edited value of a static page (see App\Support\Content). */
#[Fillable(['page', 'field_key', 'value'])]
class PageContent extends Model
{
}
