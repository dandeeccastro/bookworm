<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    public function shelves() {
        return $this->hasMany('App\Shelf');
    }
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function books(){
        return $this->hasMany('App\Book');
    }
}
