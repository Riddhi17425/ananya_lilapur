<?php

// Editable content of the Contact Us page: 'Section name' => ['field_key' => definition]
return [
    'SEO' => [
        'seo_title' => ['label' => 'Browser title', 'type' => 'text', 'default' => 'Contact Us · Ananya International School, Lilapur'],
        'seo_description' => ['label' => 'Meta description', 'type' => 'textarea', 'default' => 'Contact details, location map and a general enquiry form for Ananya International School, Lilapur.'],
    ],
    'Hero' => [
        'hero_crumb_home' => ['label' => 'Breadcrumb: home link', 'type' => 'text', 'default' => 'Home'],
        'hero_crumb_current' => ['label' => 'Breadcrumb: current page', 'type' => 'text', 'default' => 'Contact Us'],
        'hero_title' => ['label' => 'Heading', 'type' => 'title', 'default' => 'We Would Love to *Hear From You*'],
        'hero_text' => ['label' => 'Intro text', 'type' => 'textarea', 'default' => 'Whether you have a question about admissions, transport or careers, our team is happy to help.'],
        'hero_button_message' => ['label' => 'Primary button label', 'type' => 'text', 'default' => 'Send Us a Message'],
        'hero_button_map' => ['label' => 'Secondary button label', 'type' => 'text', 'default' => 'Find Us on Map'],
        'hero_image' => ['label' => 'Hero image', 'type' => 'image', 'default' => 'frontend/assets/contact-hero.png'],
        'hero_image_alt' => ['label' => 'Hero image description (alt text)', 'type' => 'text', 'default' => 'A smiling student with her school bag in front of the campus, with the words “We\'d love to hear from you!”'],
    ],
    'Campus Location' => [
        'location_kicker' => ['label' => 'Small heading above title', 'type' => 'text', 'default' => 'Campus Location'],
        'location_title' => ['label' => 'Heading', 'type' => 'text', 'default' => 'Ananya International School, Lilapur Campus'],
        'location_address' => ['label' => 'Address', 'type' => 'textarea', 'default' => 'Opp. Serene 53, Behind Sardar Dham, Lilapur, Ahmedabad-380060, Gujarat.'],
    ],
    'Contact Details' => [
        'details_sr_title' => ['label' => 'Section heading (screen readers only)', 'type' => 'text', 'default' => 'Contact details'],
        'details_card_1_title' => ['label' => 'Card 1: title', 'type' => 'text', 'default' => 'Admissions'],
        'details_card_1_phone' => ['label' => 'Card 1: phone (shown text)', 'type' => 'text', 'default' => '+91 79902 59272'],
        'details_card_1_email' => ['label' => 'Card 1: email (shown text)', 'type' => 'text', 'default' => 'admissions@ananyalilapur.org'],
        'details_card_2_title' => ['label' => 'Card 2: title', 'type' => 'text', 'default' => 'General Enquiries'],
        'details_card_2_phone' => ['label' => 'Card 2: phone (shown text)', 'type' => 'text', 'default' => '+91 79902 59272'],
        'details_card_2_email' => ['label' => 'Card 2: email (shown text)', 'type' => 'text', 'default' => 'admissions@ananyalilapur.org'],
        'details_card_3_title' => ['label' => 'Card 3: title', 'type' => 'text', 'default' => 'Careers'],
        'details_card_3_email' => ['label' => 'Card 3: email (shown text)', 'type' => 'text', 'default' => 'admissions@ananyalilapur.org'],
        'details_card_4_title' => ['label' => 'Card 4: title', 'type' => 'text', 'default' => 'Office Hours'],
        'details_card_4_text' => ['label' => 'Card 4: text', 'type' => 'text', 'default' => 'Mon to Sat, 8:00 am to 4:00 pm'],
    ],
    'Send Us a Message' => [
        'form_title' => ['label' => 'Form heading', 'type' => 'text', 'default' => 'Send Us a Message'],
        'form_submit' => ['label' => 'Submit button label', 'type' => 'text', 'default' => 'Send Message'],
    ],
    'Find Us on the Map' => [
        'map_title' => ['label' => 'Heading', 'type' => 'title', 'default' => 'Find Us *on the Map*'],
        'map_text' => ['label' => 'Intro text', 'type' => 'textarea', 'default' => 'Use the map to plan your visit to our Lilapur campus.'],
        'map_bubble_before' => ['label' => 'Mascot speech bubble: start', 'type' => 'text', 'default' => 'We’d love to '],
        'map_bubble_bold' => ['label' => 'Mascot speech bubble: bold words', 'type' => 'text', 'default' => 'hear from you'],
        'map_bubble_after' => ['label' => 'Mascot speech bubble: end', 'type' => 'text', 'default' => '!'],
        'map_image' => ['label' => 'Map image', 'type' => 'image', 'default' => 'frontend/assets/map-blob.png'],
        'map_image_alt' => ['label' => 'Map image description (alt text)', 'type' => 'text', 'default' => 'Map of the area around the campus'],
        'map_link_label' => ['label' => 'Map link label', 'type' => 'text', 'default' => 'Open in Google Maps ↗'],
        'map_directions_label' => ['label' => 'Directions button label', 'type' => 'text', 'default' => 'Get Directions'],
    ],
    'Decorative images' => [
        'deco_tree_image' => ['label' => 'Tree decoration', 'type' => 'image', 'default' => 'frontend/assets/contact-tree.png'],
        'deco_tiger_image' => ['label' => 'Tiger mascot', 'type' => 'image', 'default' => 'frontend/assets/mascot/tiger-hello.webp'],
    ],
];
