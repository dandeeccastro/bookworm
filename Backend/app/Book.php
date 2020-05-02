<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function libraries() {
        return $this->belongsToMany('App\Library');
    }
    public function series() {
        return $this->belongsTo('App\Series');
    }
    public function authors(){
        return $this->belongsToMany('App\Author');
    }
    public function publisher() {
        return $this->belongsTo('App\Publisher');
    }
}
