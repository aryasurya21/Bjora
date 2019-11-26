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
        $sender = \Session::get('userId');

        $message = new Message;
        $message->message_content = $content;
        $message->sender_id = $sender;
        $message->posted_at = Carbon::now()->format('Y-m-d H:i:s');
        $message->save();
        return back();
    }
}
