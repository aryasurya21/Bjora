<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public function Question()
    {
        return $this->belongsTo('App\Question','topic_id','topic_id');
    }

    public static $topicRules = [
        'topic_name' => ['required']
    ];
}
