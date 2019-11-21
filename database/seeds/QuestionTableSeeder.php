<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            [
                'question_status' => '1',
                'question_title' => 'Is Jose Mourinho\'s moves to Tottenham really worth it?',
                'id' => '1',
                'topic_id' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'question_status' => '1',
                'question_title' => 'What Happens to BINOMO?',
                'id' => '3',
                'topic_id' => '2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'question_status' => '1',
                'question_title' => 'Why McDonald Failed in China?',
                'id' => '2',
                'topic_id' => '3',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'question_status' => '1',
                'question_title' => 'How Laravel becoming one of the most popular framework for PHP',
                'id' => '1',
                'topic_id' => '4',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'question_status' => '1',
                'question_title' => 'How Jurgen Klopp transform Liverpool?',
                'id' => '3',
                'topic_id' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'question_status' => '1',
                'question_title' => 'What makes truffle so expensive?',
                'id' => '2',
                'topic_id' => '5',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
