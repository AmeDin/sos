<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;

class LoginController extends Controller
{
    public function login()
    {
        return view('authentication.login');
    }

    public function postLogin(Request $request)
    {
        //dd($request->all());

        try{
            if(Sentinel::authenticate($request->all())){
                $slug = Sentinel::getUser()->roles()->first()->slug;
                if($slug == 'admin')
                    return redirect('/vendors');
                elseif($slug == 'svendor')
                    return redirect('/stalls');
            }else{
                return redirect()->back()->with(['error' => 'Wrong credentials.']);
            }
        }catch(ThrottlingException $e){
            $delay = $e->getDelay();
            return redirect()->back()->with(['error' => 'You are banned for '.$delay.' seconds.']);
        }catch (NotActivatedException $e){
            return redirect()->back()->with(['error' => 'Your account is not Activated.']);
        }
    }

    public function logout()
    {
        Sentinel::logout();
        return redirect('/login');
    }
}
