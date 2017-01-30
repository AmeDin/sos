<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FixedOrder extends Model
{
    public function ingredients(){
        return $this->belongsToMany('App\Ingredient');
    }
}
