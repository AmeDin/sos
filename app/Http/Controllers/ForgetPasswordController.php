<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Reminder;
use Mail;
use Sentinel;

class ForgetPasswordController extends Controller
{
    public function forgotPassword (){
        return view('authentication.forgot-password');
    }

    public function resetPassword($email, $resetCode){
        $user = User::byEmail($email);
        $sentinelUser = Sentinel::findById($user->id);

        if(count($user)==0){
            abort(404);
        }

        if($reminder = Reminder::exists($sentinelUser)){
            if($reminder->code == $resetCode)
                return view('authentication.reset-password');
            else
                return redirect('/');
        }else{
            return redirect('/');
        }
    }

    public function postForgotPassword(Request $request)
    {
        $user = User::whereEmail($request->email)->first();
        $sentinelUser = Sentinel::findById($user->id);

        if(count($user) == 0)
            return redirect()->back()->with(['success' => 'Reset code was sent to your email']);

        $reminder = Reminder::exists($sentinelUser) ?: Reminder::create($sentinelUser);
        $this->sendEmail($user, $reminder->code);
        return redirect()->back()->with(['success' => 'Reset code was sent to your email']);
    }

    private function sendEmail($user, $code)
    {
        Mail::send('emails.forgot-password-activate', [
            'user' => $user,
            'code' => $code
        ], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject("Hello $user->first_name, reset your password.");
        });
    }

    public function postResetPassword(Request $request, $email, $resetCode){

        $this->validate($request, [
            'password' => 'confirmed|required|min:5|max:10',
            'password_confirmation' => 'required|min:5|max:10'
        ]);
        $user = User::byEmail($email);
        $sentinelUser = Sentinel::findById($user->id);

        if(count($user)==0){
            abort(404);
        }

        if($reminder = Reminder::exists($sentinelUser)){
            if($reminder->code == $resetCode){
                Reminder::complete($sentinelUser, $resetCode, $request->password);
                return redirect('/login')->with('success', 'You may now login with your new password');
            }
            else
                return redirect('/');
        }else{
            return redirect('/');
        }
    }
}
