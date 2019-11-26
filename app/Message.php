<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function send()
    {
        return $this->belongsTo('App\User','sender_id');
    }
    public function receive()
    {
        return $this->belongsToMany('App\User','receiver_id','id');
    }
}
