<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /** The FAQs that were on the admissions page; safe to run more than once. */
    public function run(): void
    {
        $transport = route('campus-facilities', [], false).'#transport';
        $beyond = route('beyond-academics', [], false);

        $items = [
            ['Which board does Ananya follow?', 'Ananya follows the CBSE curriculum. The affiliation process takes time, and the affiliation number will be shared once it is officially allotted.'],
            ['What is the class size?', 'Each class has 35 students, in a classroom of approximately 650 sq. ft.'],
            ['Is there an entrance test?', 'For Play School to Class 2, we hold a friendly interaction with no written test. For higher classes, a simple assessment helps us place the child in the right class.'],
            ['Do you provide school transport?', 'Yes, we run school buses on planned routes. Please see the <a href="'.$transport.'">Transport section</a> for details and the enrolment form.'],
            ['Is there a cafeteria?', 'Yes, we offer a hygienic cafeteria.'],
            ['What are the school timings?', 'Please contact our admissions desk for the timings for each stage.'],
            ['How can I stay in touch with my child’s progress?', 'Through monthly parent club interactions, progress reports and our parent portal. You can also approach the school whenever you have a query.'],
            ['Can I visit the campus before applying?', 'Of course. Please <a href="#visit">book a campus visit</a> and we will show you around.'],
            ['Which sports and activities are available?', 'Please see the <a href="'.$beyond.'">Beyond Academics page</a> for the full list.'],
        ];

        foreach ($items as [$question, $answer]) {
            Faq::firstOrCreate(['question' => $question], ['answer' => $answer, 'status' => 1]);
        }
    }
}
