<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function createLog($origin, $action, $user)
    {
        $this->origin = $origin;
        $this->action = $action;
        $this->user_id = $user;
        $this->save();
    }
}
