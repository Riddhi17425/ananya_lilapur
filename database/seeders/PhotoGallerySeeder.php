<?php

namespace Database\Seeders;

use App\Models\PhotoGallery;
use App\Models\PhotoGalleryCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PhotoGallerySeeder extends Seeder
{
    /**
     * The photos that were written directly in the front-end pages ("Life at Ananya" on the
     * home page and "Life on Campus" on News & Gallery). The images are copied from
     * public/frontend/assets to the public storage disk. Safe to run more than once.
     */
    public function run(): void
    {
        // [category, name, image file in public/frontend/assets]
        $photos = [
            // Life on Campus (News & Gallery page): inner image
            ['Sports', 'Cricket practice', 'cricket-arch.png'],
            ['Events', 'Playtime together', 't-2004.png'],
            ['Arts', 'Art studio', 'space-art.png'],
            ['Events', 'Hands-on learning', 'about-hero.png'],
            ['Sports', 'Indoor sports hall', 'space-sports.png'],
            ['Arts', 'Writing and drawing', 'classroom-girl.png'],
            ['Events', 'Learning outdoors', 'mission-photo.png'],
            ['Events', 'Robotics corner', 'stage-photo.png'],
            ['Announcements', 'Admissions open for April 2027', 'give-child.png'],

            // Life at Ananya (home page slider): list image. The slider shows the newest photos first,
            // so these are added in reverse to keep the original left-to-right order.
            ['Life at Ananya', 'Team Spirit in Every Pass', 'home-team-spirit.webp'],
            ['Life at Ananya', 'Stories That Spark Imagination', 'home-stories-imagination.webp'],
            ['Life at Ananya', 'Numbers Come Alive Through Play', 'home-numbers-through-play.webp'],
            ['Life at Ananya', 'Nature Is Our Classroom Too', 'home-nature-classroom.webp'],
            ['Life at Ananya', 'Little Voices, Big Confidence', 'home-little-voices.webp'],
            ['Life at Ananya', 'Little Discoveries, Shared Achievements', 'home-little-discoveries.webp'],
            ['Life at Ananya', 'Helping Hands, Caring Hearts', 'home-helping-hands.webp'],
            ['Life at Ananya', 'Finding Rhythm, Finding Joy', 'home-finding-rhythm.webp'],
            ['Life at Ananya', 'Every Move Is a New Strategy', 'home-every-move.webp'],
            ['Life at Ananya', 'Every Creation Has a Story', 'home-every-creation.webp'],
            ['Life at Ananya', 'A Happy Start to Every Day', 'home-happy-start.webp'],
            ['Life at Ananya', 'A Break Full of Conversations', 'home-break-conversations.webp'],
        ];

        // Created in this order so the filter buttons keep their original order.
        $categories = [];
        foreach (['Events', 'Sports', 'Arts', 'Achievements', 'Announcements', 'Life at Ananya'] as $name) {
            $categories[$name] = PhotoGalleryCategory::firstOrCreate(['category_name' => $name], ['status' => 1]);
        }

        $disk = Storage::disk('public');

        foreach ($photos as [$category, $name, $file]) {
            $source = public_path('frontend/assets/'.$file);

            if (! is_file($source)) {
                $this->command?->warn("Image not found, skipped: {$file}");

                continue;
            }

            if (PhotoGallery::where('name', $name)->exists()) {
                continue;
            }

            // The list image is shown on the home page slider ("Life at Ananya"), the inner image on
            // the News & Gallery page ("Life on Campus"). The HTML used different photos for the two,
            // so each photo gets only the image of the page it was on.
            $isHomePhoto = $category === 'Life at Ananya';
            $path = ($isHomePhoto ? 'photo-galleries/list/' : 'photo-galleries/inner/').$file;
            $disk->put($path, file_get_contents($source));

            PhotoGallery::create([
                'category_id' => $categories[$category]->id,
                'name' => $name,
                'list_image' => $isHomePhoto ? $path : null,
                'inner_image' => $isHomePhoto ? null : $path,
                'status' => 1,
            ]);
        }
    }
}
