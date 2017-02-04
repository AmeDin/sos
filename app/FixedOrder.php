<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FixedOrder extends Model
{
    public function ingredients(){
        return $this->belongsToMany('App\Ingredient')
            ->withPivot('quantity');
    }

    public function dish(){
        return $this->belongsTo('App\Dish');
    }
}
