<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageStuff extends Model
{

    protected $table = 'images';

    protected $fillable = [
        'url'
    ];
}
