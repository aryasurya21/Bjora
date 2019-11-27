<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Message;
class MessageController extends Controller
{
    public function sendMessage(Request $r)
    {
        $content = $r->input('message_content');
        $receiver = $r->input('receiver');

        $sender = \Session::get('userId');

        $message = new Message;
        $message->message_content = $content;
        $message->sender_id = $sender;
        $message->posted_at = Carbon::now()->format('Y-m-d H:i:s');
        $message->save();

        $newestmessage = Message::orderBy('posted_at','DESC')->first();
        \DB::table('user_message')->insert([
            'receiver_id' => $receiver,
            'message_id' => $newestmessage->message_id
        ]);
        return back();
    }

    public function deleteMessage($messageid)
    {
        $message = Message::where('message_id',$messageid);
        $message->delete();

        \DB::table('user_message')
            ->where('message_id',$messageid)
            ->delete();

        return back();
    }
}
