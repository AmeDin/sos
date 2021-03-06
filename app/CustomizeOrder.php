<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomizeOrder extends Model
{
    public function ingredients(){
        return $this->belongsToMany('App\Ingredient')
            ->withPivot('portion');
    }

    public function stall(){
        return $this->belongsTo('App\Stall');
    }
}