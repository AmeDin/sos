<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = [
        'name', 'price', 'category_id'
    ];

    public function dishes(){
        return $this->belongsToMany('App\Dish');
    }

    public function nutrition(){
        return $this->hasOne('App\Nutrition');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function fixed_orders(){
        return $this->belongsToMany('App\FixedOrder');
    }
}
