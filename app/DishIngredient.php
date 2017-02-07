<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DishIngredient extends Model
{
    protected $table = 'dish_ingredient';

    protected $fillable = [
        'dish_id', 'ingredient_id',
    ];
}
