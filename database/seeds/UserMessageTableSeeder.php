<?php

use Illuminate\Database\Seeder;

class UserMessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_message')->insert([
            [
                'receiver_id' => '2',
                'message_id' => '1'
            ],
            [
                'receiver_id' => '1',
                'message_id' => '2'
            ],
            [
                'receiver_id' => '2',
                'message_id' => '3'
            ],
            [
                'receiver_id' => '1',
                'message_id' => '4'
            ]
        ]);
    }
}
