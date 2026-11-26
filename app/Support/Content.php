<?php

namespace App\Support;

use App\Models\PageContent;
use Illuminate\Support\HtmlString;
use InvalidArgumentException;
use Throwable;

/**
 * Reads the editable static content of one website page.
 *
 * The original text / images are written in config/page_content/<page>.php. The admin
 * ("Pages Content" module) saves only what it changed in the page_contents table, so an
 * empty table shows exactly the original design.
 *
 * In a page view it is available as $c (see AppServiceProvider):
 *   {{ $c->text('hero_text') }}      plain text (escaped)
 *   {{ $c->title('hero_title') }}    heading: *words* get the highlight colour, new lines become <br>
 *   {!! $c->html('intro') !!}        formatted text from the editor (cleaned when saved)
 *   {{ $c->image('hero_image') }}    image URL
 *   {!! $c->attr('key') !!}          escaped plain string (for HTML attributes written with {!! !!})
 *   $c->raw('seo_title')             the value as it is, for @section('title', ...) (Blade escapes it)
 */
class Content
{
    /** Pages of the module: key => label, the view that shows it and its route name. */
    public const PAGES = [
        'home' => ['label' => 'Home Page', 'view' => 'front.pages.index', 'route' => 'home'],
        'about' => ['label' => 'About Us', 'view' => 'front.pages.about', 'route' => 'about'],
        'academics' => ['label' => 'Academics', 'view' => 'front.pages.academics', 'route' => 'academics'],
        'beyond-academics' => ['label' => 'Beyond Academics', 'view' => 'front.pages.beyond-academics', 'route' => 'beyond-academics'],
        'campus-facilities' => ['label' => 'Campus and Facilities', 'view' => 'front.pages.campus-facilities', 'route' => 'campus-facilities'],
        'admissions' => ['label' => 'Admissions', 'view' => 'front.pages.admissions', 'route' => 'admissions'],
        'careers' => ['label' => 'Career', 'view' => 'front.pages.careers', 'route' => 'careers'],
        'contact' => ['label' => 'Contact Us', 'view' => 'front.pages.contact', 'route' => 'contact'],
        'news-gallery' => ['label' => 'News and Gallery', 'view' => 'front.pages.news-gallery', 'route' => 'news-gallery'],
    ];

    /** Field types: text, textarea, title, html, image. */
    public const TYPES = ['text', 'textarea', 'title', 'html', 'image'];

    private array $fields = [];

    private array $saved = [];

    public function __construct(private string $page)
    {
        foreach (self::sections($page) as $fields) {
            $this->fields += $fields;
        }

        // If the table is not there yet (migration not run) the original content is shown.
        try {
            $this->saved = PageContent::where('page', $page)->pluck('value', 'field_key')->all();
        } catch (Throwable) {
            $this->saved = [];
        }
    }

    public static function forPage(string $page): self
    {
        return new self($page);
    }

    /** Page key of a view name, e.g. "front.pages.index" => "home". Null when it is not an editable page. */
    public static function pageForView(string $view): ?string
    {
        foreach (self::PAGES as $page => $info) {
            if ($info['view'] === $view && config()->has('page_content.'.$page)) {
                return $page;
            }
        }

        return null;
    }

    /** Fields of a page grouped by section: ['Section name' => ['key' => definition, ...], ...] */
    public static function sections(string $page): array
    {
        return (array) config('page_content.'.$page, []);
    }

    // ---- Reading -------------------------------------------------------------------------

    public function text(string $key): HtmlString
    {
        $value = e($this->raw($key));

        return new HtmlString($this->definition($key)['type'] === 'textarea' ? nl2br($value, false) : $value);
    }

    public function title(string $key): HtmlString
    {
        $class = e($this->definition($key)['accent'] ?? 'accent');
        $value = preg_replace('/\*(.+?)\*/s', '<span class="'.$class.'">$1</span>', e($this->raw($key)));

        return new HtmlString(nl2br($value, false));
    }

    public function html(string $key): HtmlString
    {
        return new HtmlString($this->raw($key));
    }

    public function attr(string $key): string
    {
        return e($this->raw($key));
    }

    public function image(string $key): string
    {
        $value = $this->raw($key);

        // A saved image lives in storage/app/public, the original one in public/.
        return $this->isUploaded($key) ? asset('storage/'.$value) : asset($value);
    }

    /** The saved value, or the original one when nothing was saved. */
    public function raw(string $key): string
    {
        $definition = $this->definition($key);
        $value = $this->saved[$key] ?? null;

        if ($value === null || ($definition['type'] === 'image' && $value === '')) {
            return (string) ($definition['default'] ?? '');
        }

        return $value;
    }

    public function isUploaded(string $key): bool
    {
        return ($this->saved[$key] ?? '') !== '' && $this->definition($key)['type'] === 'image';
    }

    private function definition(string $key): array
    {
        if (! isset($this->fields[$key])) {
            // A wrong key is a typo in a view: fail loudly while developing, stay quiet on the live site.
            if (app()->environment('local', 'testing')) {
                throw new InvalidArgumentException("Page content field [{$this->page}.{$key}] is not defined in config/page_content/{$this->page}.php");
            }

            return ['type' => 'text', 'default' => ''];
        }

        return $this->fields[$key];
    }
}
