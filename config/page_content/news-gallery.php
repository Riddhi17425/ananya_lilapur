<?php

// Editable content of the News and Gallery page: 'Section name' => ['field_key' => definition]
return [
    'SEO' => [
        'seo_title' => ['label' => 'Browser title', 'type' => 'text', 'default' => 'School News & Gallery · Ananya International School, Lilapur'],
        'seo_description' => ['label' => 'Meta description', 'type' => 'textarea', 'default' => 'Announcements, events, achievements and photo galleries from campus life.'],
    ],
    'Hero' => [
        'hero_crumb_home' => ['label' => 'Breadcrumb: home link', 'type' => 'text', 'default' => 'Home'],
        'hero_crumb_current' => ['label' => 'Breadcrumb: current page', 'type' => 'text', 'default' => 'School News & Gallery'],
        'hero_title' => ['label' => 'Heading', 'type' => 'title', 'default' => 'Moments and *Milestones*'],
        'hero_text' => ['label' => 'Intro text', 'type' => 'textarea', 'default' => 'Latest announcements, events, achievements and photo galleries from campus life.'],
        'hero_button' => ['label' => 'Button label', 'type' => 'text', 'default' => 'Browse the Gallery'],
    ],
    'Decorative images' => [
        'hero_collage_1_image' => ['label' => 'Hero collage image 1', 'type' => 'image', 'default' => 'frontend/assets/students-arch.png'],
        'hero_collage_2_image' => ['label' => 'Hero collage image 2', 'type' => 'image', 'default' => 'frontend/assets/space-library.png'],
        'hero_collage_3_image' => ['label' => 'Hero collage image 3', 'type' => 'image', 'default' => 'frontend/assets/t-2012.png'],
        'hero_collage_4_image' => ['label' => 'Hero collage image 4', 'type' => 'image', 'default' => 'frontend/assets/about-hero.png'],
        'hero_collage_5_image' => ['label' => 'Hero collage image 5 (star)', 'type' => 'image', 'default' => 'frontend/assets/acad-star.png'],
        'gallery_mascot_image' => ['label' => 'Gallery mascot image', 'type' => 'image', 'default' => 'frontend/assets/mascot/tiger-hello.webp'],
    ],
    'Photo Gallery' => [
        'gallery_bubble' => ['label' => 'Mascot speech bubble', 'type' => 'html', 'default' => 'Say <b>cheese</b>!'],
        'gallery_kicker' => ['label' => 'Small label above heading', 'type' => 'text', 'default' => 'Photo Gallery'],
        'gallery_title' => ['label' => 'Heading', 'type' => 'title', 'default' => 'Life on *Campus*'],
        'gallery_filter_all' => ['label' => 'Filter button: all photos', 'type' => 'text', 'default' => 'All'],
        'gallery_empty' => ['label' => 'Text shown when a category has no photos', 'type' => 'textarea', 'default' => 'No photos in this category yet. The school will add achievements as the first year unfolds.'],
    ],
];
