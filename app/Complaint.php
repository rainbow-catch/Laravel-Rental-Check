<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'company_id','customer_id','category_id','incident_date','zipcode',
        'detail', 'amount', 'pickup_date', 'return_date', 'description', 'incident_types',
        'media_type', 'pathOrUrl',
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
}
