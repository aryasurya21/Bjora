<?php

use Illuminate\Database\Seeder;

class TopicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topics')->insert([
            [
                'topic_name' => 'Sports'
            ],
            [
                'topic_name' => 'Finance'
            ],
            [
                'topic_name' => 'Lifestyle'
            ],
            [
                'topic_name' => 'Technology'
            ],
            [
                'topic_name' => 'Food'
            ]
        ]);
    }
}
