<?php

namespace App\Http\Controllers;
;
use Illuminate\Http\Request;
use App\User;
use Activation;
use Sentinel;
use Session;
use \Illuminate\Database\QueryException;

class ActivationController extends Controller
{
    public function activate($email, $activateCode)
    {
        try{
            $user = User::whereEmail($email)->first();

            $sentinelUser= Sentinel::findById($user->id);
            if(Activation::complete($sentinelUser, $activateCode))
            {
                Session::flash('success', 'Activation successful, you can log in now.');
                return redirect('/login');
            }else{
                Session::flash('error', 'Your account have already been activated.');
                return redirect('/');
            }
        }catch(QueryException $e){
            $err = $e->getMessage();
            return redirect()->back()->with(['error' => $err]);
        }


    }
}
