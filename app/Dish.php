<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    public function stall(){
        return $this->belongsTo('App\Stall');
    }

    public function ingredients(){
        return $this->belongsToMany('App\Ingredient');
    }

    public function image(){
        return $this->belongsTo('App\Image');
    }
}