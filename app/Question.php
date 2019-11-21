<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function Answer()
    {
        return $this->hasMany('App\Answer','question_id');
    }
    public function User()
    {
        return $this->belongsTo('App\User','id','id');
    }
}
