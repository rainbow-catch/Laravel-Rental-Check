<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'first_name', 'last_name', 'gender', 'address', 'phone', 'avatar',
        'linkedin_id', 'instagram_id', 'facebook_id', 'twitter_id',
        'license', 'about'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function user() {
        $this->belongsTo('App\User');
    }
}
