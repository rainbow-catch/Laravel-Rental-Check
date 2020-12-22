<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function incidents($ids=null) {
        $incidents = $this->belongsToMany('App\Incident', 'category_has_incidents', 'category_id', 'incident_id');
        if(!$ids) return $incidents;
        else {
            $incidents->sync($ids);
        }
    }
}
