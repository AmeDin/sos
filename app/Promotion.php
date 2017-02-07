<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = [
        'id','name','description','price', 'stall_id', 'image_id', 'start_date', 'end_date'
    ];

    public function stall(){
        return $this->belongsTo('App\Stall');
    }
    public function image(){
        return $this->belongsTo('App\Image');
    }



}
