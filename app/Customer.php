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
        return $this->belongsTo('App\User');
    }

    public function rentalScore() {
        $score = 0;
        foreach(Complaint::where('customer_id', $this->id)->get() as $complaint) {
            $score += $this->calculateRentalScoreFromComplaint($complaint);
        }
        return $score;
    }

    private function calculateRentalScoreFromComplaint(Complaint $complaint){
        $subscore = 0;
        foreach(Category::find($complaint->category_id)->scoreByIncident() as $item) {
            if(in_array($item->incident_id, json_decode($complaint->incident_types))) $subscore += $item->score;
        }
        return $subscore;
    }
}
