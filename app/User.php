<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','gender','address','photo','dateofbirth','isAdmin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function question()
    {
        return $this->hasMany('App\Question','id','id');
    }

    public function answer()
    {
        return $this->hasMany('App\Answer','id','id');
    }

    public function message()
    {
        return $this->belongsToMany('App\Message', 'receiver_id', 'id');
    }

    public function sent_messages()
    {
        return $this->hasMany('App\Message','sender_id');
    }

    //for manual register user in adduser
    public static $registerRules = [
        'name' => ['required', 'string', 'max:100'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:6', 'confirmed','alpha_num'],
        'gender' => ['required','in:male,female'],
        'address' => ['required'],
        'photo' => ['required', 'mimes:jpeg,png,jpg'],
        'dateofbirth' => ['required','date_format:Y-m-d']
    ];

    public static $updateRules = [
        'name' => ['required', 'string', 'max:100'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'password' => ['required', 'string', 'min:6', 'confirmed','alpha_num'],
        'gender' => ['required','in:male,female'],
        'address' => ['required'],
        'photo' => ['required', 'mimes:jpeg,png,jpg'],
        'dateofbirth' => ['required','date_format:Y-m-d']
    ];
}
