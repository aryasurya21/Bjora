<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            [
                'message_content' => 'Hai boleh kenalan gak',
                'sender_id' => '1',
                'posted_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'message_content' => 'boleh, kamu lagi apa nich',
                'sender_id' => '3',
                'posted_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'message_content' => 'ga lagi apa apa, pacaran yuks',
                'sender_id' => '1',
                'posted_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'message_content' => 'anjing',
                'sender_id' => '2',
                'posted_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
