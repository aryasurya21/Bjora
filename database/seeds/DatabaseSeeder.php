<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(QuestionTableSeeder::class);
        $this->call(TopicTableSeeder::class);
        $this->call(AnswerTableSeeder::class);
    }
}
