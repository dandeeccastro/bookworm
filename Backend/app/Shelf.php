<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
    public function library() {
        return $this->belongsTo('App\Shelf');
    }
}
