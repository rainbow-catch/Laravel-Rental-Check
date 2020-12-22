<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $fillable = ['category', 'order', 'isActive'];
    //
    public function incidents($ids=null) {
        $incidents = $this->belongsToMany('App\Incident', 'category_has_incidents', 'category_id', 'incident_id');
        if(!$ids) {
            return $incidents;
        }
        else {
            $incidents->sync($ids);
            return true;
        }
    }

    public function scoreByIncident() {
        return DB::table('category_has_incidents')->where('category_id', $this->id)->get();
    }
}
