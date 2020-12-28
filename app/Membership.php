<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $fillable = ['name','price', 'state', 'search', 'image', 'video', 'video_length', 'record'];
}
