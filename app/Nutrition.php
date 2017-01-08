<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nutrition extends Model
{
    protected $table = 'nutritions';
    protected $fillable = [
        'calories', 'carbohydrate', 'saturate_fat', 'trans_fat', 'fibre', 'sugar', 'protein', 'ingredient_id'
    ];
}
