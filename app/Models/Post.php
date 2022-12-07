<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // Get author of post


    // Get the route key for the model.
    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Get user
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    // Get comments 

    public function comments()
    {
        return $this->hasMany('App\Models\Comment')->latest();
    }
}
