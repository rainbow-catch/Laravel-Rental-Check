<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'company_name', 'manager_name', 'gender', 'address', 'phone', 'avatar',
        'linkedin_id', 'instagram_id', 'facebook_id', 'twitter_id',
        'fed_id', 'license', 'category_id', 'membership', 'about'
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
