<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class AnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answers')->insert([
            [
                'answer_id' => '1',
                'answers' => 'No, Mourinho deserves to go to a better club than spursy',
                'question_id' => '4',
                'id' => '2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'answer_id' => '2',
                'answers' => 'Furthermore, he is a top manager aint he, he should go for national teams',
                'question_id' => '4',
                'id' => '2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'answer_id' => '3',
                'answers' => 'You could find a lot of tutorial in internet',
                'question_id' => '13',
                'id' => '2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'answer_id' => '4',
                'answers' => 'Or you could learn from chef by tutoring from one, either ways could teach you',
                'question_id' => '13',
                'id' => '2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
