<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stall extends Model
{
    protected $fillable = [
        'name', 'user_id', 'image_id'
    ];

    public function image(){
        return $this->belongsTo('App\Image');
    }

}
