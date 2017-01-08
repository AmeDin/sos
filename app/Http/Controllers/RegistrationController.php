<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Http\Request;
use Sentinel;
use Activation;
use App\User;
use Mail;
use Validator;
use \Illuminate\Database\QueryException;
use Session;


class RegistrationController extends Controller
{
    public function register()
    {
        return view('authentication.register');
    }

    public function postRegister(Request $request)
    {
        try {
            $this->validate($request, EloquentUser::$register_validate);
            $user = Sentinel::register($request->all());

            $activation = Activation::create($user);

            $role = Sentinel::findRoleBySlug('svendor');

            $role->users()->attach($user);

            $this->sendEmail($user, $activation->code);
            Session::flash('success', 'Registration successful, please check your mail for he activation link.');
            return redirect('/');
        }catch (QueryException $e){
            $err = $e->getMessage();
            if( strpos($err, "Duplicate entry") !== false)
                return redirect()->back()->with(['error' => "User ID taken, please register with another email"]);
            else
                return redirect()->back()->with(['error' => $err]);
        }
    }

    public function sendEmail($user, $code)
    {
        Mail::send('emails.activation', [
            'user' =>$user,
            'code' => $code], function($message) use ($user) {
            $message->to($user->email);

            $message->subject("Hello $user->first_name, activate your account");
        });
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }
}
