<?php

namespace Database\Seeders;

use App\Models\LearningStage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class LearningStageSeeder extends Seeder
{
    /** The stage tabs that were on the Academics page; safe to run more than once. */
    public function run(): void
    {
        $stages = [
            [
                'tab_name' => 'Foundational',
                'kicker' => 'Foundational Stage · Play School to Class 2',
                'heading' => 'Where Little Learners Take Their First Steps',
                'description' => 'At Ananya, the Foundational Stage focuses on language, early numeracy, movement, play, imagination and social-emotional development. Stories, conversations, games, music and hands-on activities help children make sense of the world around them. We give young learners opportunities to explore at their own pace, express themselves and develop the confidence to try something new.',
                'points' => "Play-based and activity-based learning\nEarly language, number sense and motor skills\nStorytelling, rhymes, music, movement and art\nSensory and outdoor play\nSocial and emotional learning: sharing, kindness and confidence",
                'classes' => "Play School\nNursery\nJr. KG\nSr. KG\nClass 1\nClass 2",
                'file' => 'stage-foundational.webp',
                'image_alt' => 'Young learners reading a storybook and playing with ABC blocks in a bright classroom',
                'image_width' => 340,
            ],
            [
                'tab_name' => 'Primary',
                'kicker' => 'Primary School (Grades 3 to 5)',
                'heading' => 'From discovering ideas to making connections.',
                'description' => 'The primary years are a time when curiosity grows into deeper understanding. Children strengthen their reading, writing and mathematical skills while exploring science, the environment, people and the world around them. Through discussions, activities, projects and collaborative tasks, they learn to connect ideas and express their thinking. Alongside academic progress, we encourage independence, responsibility, kindness and a willingness to learn from mistakes.',
                'file' => 'stage-primary.webp',
                'image_alt' => 'Students exploring a plant and reading a science book together',
                'image_width' => 340,
            ],
            [
                'tab_name' => 'Middle',
                'kicker' => 'Middle School (Grades 6 to 8)',
                'heading' => 'Thinking deeper. Looking wider.',
                'description' => 'As children grow, their questions become more complex and their perspectives begin to widen. Middle school learning encourages students to analyse information, consider different viewpoints, investigate problems and work with greater independence. Subject knowledge is strengthened through application, discussion, research and interdisciplinary connections. Students also begin to understand their interests, recognise their strengths and take greater ownership of their learning.',
                'file' => 'stage-middle.webp',
                'image_alt' => 'Middle school students discussing ideas over books and a laptop',
                'image_width' => 300,
            ],
            [
                'tab_name' => 'Secondary',
                'kicker' => 'Secondary & Senior Secondary School',
                'heading' => 'Preparing for the choices ahead.',
                'description' => 'Coming soon: programme details and grade availability will be announced soon. The next chapter of the Ananya learning journey is taking shape.',
                'file' => 'stage-secondary.webp',
                'image_alt' => 'Senior students with Physics, Chemistry and Mathematics books, working with their teacher',
                'image_width' => 300,
                'image_arch' => true,
                'badge' => 'Coming soon',
                'notify_button' => true,
            ],
        ];

        foreach ($stages as $i => $stage) {
            if (LearningStage::withTrashed()->where('tab_name', $stage['tab_name'])->exists()) {
                continue;
            }

            // Copy the picture that was used on the page into the uploads folder.
            $file = $stage['file'];
            unset($stage['file']);
            $stage['image'] = 'learning-stages/'.$file;
            Storage::disk('public')->put($stage['image'], file_get_contents(public_path('frontend/assets/academics/'.$file)));

            LearningStage::create($stage + ['sort_order' => $i + 1, 'status' => 1]);
        }
    }
}
