<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /** The testimonials that were on the home page; safe to run more than once. */
    public function run(): void
    {
        $items = [
            ['Priya Sharma', 'Grade 2 parent', 'Our daughter now comes home with questions about everything, and her teachers actually welcome them. She is curious, confident and genuinely happy to go to school.'],
            ['Rahul Mehta', 'Nursery parent', 'The early-years team knew our son by name within a week. He settled in so gently, and we always feel like partners in his learning, not just visitors.'],
            ['Sneha Patel', 'Grade 5 parent', 'What I love is that learning connects to real life. My son explains science ideas using things he has seen and done, not lines he has memorised.'],
            ['Meera Joshi', 'Grade 3 parent', 'Beyond academics, Ananya cares about who the children are becoming: kind, respectful and responsible. Sports, art and music are valued as much as the classroom.'],
            ['Amit & Kavita Desai', 'Parent of two students', 'Communication is open and warm, the campus feels safe and cheerful, and both our children feel they matter. We could not have asked for a better school.'],
        ];

        foreach ($items as [$name, $category, $description]) {
            Testimonial::firstOrCreate(
                ['name' => $name, 'description' => $description],
                ['reviewer_category' => $category, 'star' => 5, 'status' => 1],
            );
        }
    }
}
