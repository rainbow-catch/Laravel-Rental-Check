<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'company_id','customer_id','category_id','incident_date','zipcode',
        'detail', 'amount', 'pickup_date', 'return_date', 'description', 'incident_types',
        'media_type', 'pathOrUrl', 'isActive'
    ];

    public function company() {
        return $this->belongsTo('App\Company');
    }

    public function customer() {
        return $this->belongsTo('App\Customer');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function rentalScore(){
        $subscore = 0;
        foreach(Category::find($this->category_id)->scoreByIncident() as $item) {
            if(in_array($item->incident_id, json_decode($this->incident_types))) $subscore += $item->score;
        }
        return $subscore;
    }
}
