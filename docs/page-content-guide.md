# Pages Content module: how a page is made editable

The admin module **Pages Content** lets the admin change the static text and images of the website pages.

* The **original** text / images of a page are written in `config/page_content/<page>.php`.
* The admin saves only the values it **changes** in the `page_contents` table (model `App\Models\PageContent`).
* A page view reads everything through `$c` (class `App\Support\Content`, shared with every `front.pages.*` view).
  With an empty table the page renders **exactly** as before.

| Page key | View | Config file |
|---|---|---|
| home | `front/pages/index.blade.php` | `config/page_content/home.php` |
| about | `front/pages/about.blade.php` | `config/page_content/about.php` |
| academics | `front/pages/academics.blade.php` | `config/page_content/academics.php` |
| beyond-academics | `front/pages/beyond-academics.blade.php` | `config/page_content/beyond-academics.php` |
| campus-facilities | `front/pages/campus-facilities.blade.php` | `config/page_content/campus-facilities.php` |
| admissions | `front/pages/admissions.blade.php` | `config/page_content/admissions.php` |
| careers | `front/pages/careers.blade.php` | `config/page_content/careers.php` |
| contact | `front/pages/contact.blade.php` | `config/page_content/contact.php` |
| news-gallery | `front/pages/news-gallery.blade.php` | `config/page_content/news-gallery.php` |

## Config file format

```php
<?php

// Editable content of the Home page: 'Section name' => ['field_key' => definition]
return [
    'SEO' => [
        'seo_title' => ['label' => 'Browser title', 'type' => 'text', 'default' => 'Ananya International School, Lilapur'],
        'seo_description' => ['label' => 'Meta description', 'type' => 'textarea', 'default' => '...'],
    ],
    'Hero' => [
        'hero_title' => ['label' => 'Heading', 'type' => 'title', 'default' => "Growing Beyond\n*What We Are.*"],
        'hero_image' => ['label' => 'Hero image', 'type' => 'image', 'default' => 'frontend/assets/home-hero.webp'],
        'hero_image_alt' => ['label' => 'Hero image description (alt text)', 'type' => 'text', 'default' => '...'],
    ],
];
```

* The array key of a section is the heading shown in the admin (use the visible section names, in page order).
  The first section of every page is `'SEO'` with `seo_title` and `seo_description` (the `@section('title')` / `@section('description')` values).
* Field keys are `snake_case`, unique inside the page, prefixed by the section (`hero_title`, `why_card_1_text` ...).
* Definition: `label` (shown in the admin), `type`, `default`, optional `hint` (one short line shown under the field).

| type | admin input | in the view | notes |
|---|---|---|---|
| `text` | one line | `{{ $c->text('key') }}` | plain text, escaped |
| `textarea` | several lines | `{{ $c->text('key') }}` | plain text, new lines become `<br>` |
| `title` | two lines | `{{ $c->title('key') }}` | heading: `*words*` get the highlight `<span class="accent">`, new line becomes `<br>`. If the original span has other classes add `'accent' => 'accent br'` to the definition |
| `html` | rich text editor | `{!! $c->html('key') !!}` | allowed tags: `p br b strong i em u ul ol li a`. Use only for body copy whose original markup is just those tags |
| `image` | file upload | `{{ $c->image('key') }}` | `default` is the path **inside `public/`**, e.g. `frontend/assets/x.webp` (the same text that was inside `asset('...')`) |

For `@section('title', ...)` / `@section('description', ...)` use `$c->raw('seo_title')` (Blade already escapes the value of `@section`, so `attr()` would escape it twice). `attr()` is for HTML attributes written with `{!! !!}`.

### Rules

1. **The rendered page must not change** when nothing is saved: keep every tag, class, id, attribute, style, SVG, script and the order of elements. Only replace the visible text and the image path.
2. Write defaults as **plain characters**, not HTML entities (`&` not `&amp;`, `’` not `&rsquo;`, a real non-breaking space instead of `&nbsp;`): the output is escaped again by `$c`.
3. Make every visible static text editable: headings, kickers, paragraphs, button / link labels (not their `href`), list items, chips, numbers and stats, captions, quotes, names, tab labels. Make every `<img>` editable (image field), plus its `alt` text when it is not empty. Put decorative images in a section named `Decorative images`.
4. Repeated cards or items: one field per value with numbered keys (`card_1_title`, `card_1_text`, `card_1_image` ...). There is no repeater.
5. Text with an inline link or a `{{ route() }}` inside (for example `Please see the <a href="{{ route('x') }}">Transport section</a> for details`): keep the `<a>` in the view and make the pieces separate fields (`..._before`, `..._link`, `..._after`). Never put `route()` or `asset()` inside the config.
6. Do **not** touch: forms (labels, placeholders, `<option>`s, inputs, buttons that submit), `href`/`action`/`data-*` attributes, inline `<script>`s, the header, footer, enquiry pop-up and any other shared partial, and **content that is already managed by an admin module** (see below).
7. Leave CSS background images and SVG sprite icons as they are.
8. Nothing is stored in the config except original values. No logic in the config files (plain arrays only).

### Content that already comes from an admin module (never make it editable here)

| Page | Dynamic part (keep the Blade loop exactly as it is) |
|---|---|
| home | Testimonials cards (`$testimonials` loop), "Life at Ananya" photo strip (`$homeGalleries` loop) |
| academics | The four stage tabs / panels (`$stages` loop). The section heading and intro line around them are static and **are** editable |
| admissions | The FAQ items (`$faqs` loop). The section heading is static and **is** editable |
| news-gallery | Category filter buttons and photo cards (`$categories` / `$galleries` loops) |
| any page | Inquiry forms |

## Checking your work

1. Before editing, save the page as it is now: `curl -s http://localhost/ananya_lilapur/public/<path> > <scratch>/<page>-before.html`
2. After editing, save it again to `<page>-after.html` and compare ignoring whitespace and the CSRF token:

```bash
norm() { grep -v 'csrf-token' "$1" | grep -v 'name="_token"' | tr -s ' \t\r\n' ' ' | sed 's/> </>\n</g'; }
diff <(norm before.html) <(norm after.html) && echo IDENTICAL
```

   The two files must be identical. A `500` page means a wrong field key (a missing key throws an error in the local environment).
3. Every `$c->...('key')` used in the view must exist in the config file and every key in the config must be used in the view.
