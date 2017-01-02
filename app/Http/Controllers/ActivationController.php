<?php

namespace App\Http\Controllers;
;
use Illuminate\Http\Request;
use App\User;
use Activation;
use Sentinel;

class ActivationController extends Controller
{
    public function activate($email, $activateCode)
    {
        $user = User::whereEmail($email)->first();

        $sentinelUser= Sentinel::findById($user->id);
        if(Activation::complete($sentinelUser, $activateCode))
        {
            return redirect('/login');
        }else{

        }
    }
}
