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
        'fed_id', 'license', 'membership', 'about'
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
        return $this->belongsTo('App\User');
    }

    public function categories($ids=null) {
        $categories = $this->belongsToMany('App\Category', 'company_has_categories', 'company_id', 'category_id');
        if(!$ids) {
            return $categories->get();
        }
        else {
            $categories->sync($ids);
            return true;
        }
    }

    public function categoryNames() {
        $result = [];
        foreach($this->categories() as $item)
            array_push($result, $item->category);
        return implode(", ", $result);
    }

    public function hasCategory($id) {
        foreach($this->categories() as $item)
            if($item->id == $id) return true;
        return false;
    }

    public function membership() {
        return $this->belongsTo('App\Membership');
    }

    public function complaints() {
        return $this->hasMany('App\Complaint');
    }
}
