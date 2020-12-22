<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    //
    protected $fillable = ['incident', 'isActive'];

    public function categories() {
        return $this->belongsToMany('App\Category', 'category_has_incidents', 'incident_id', 'category_id');
    }
}
