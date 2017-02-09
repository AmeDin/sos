<?php

namespace App\Http\Controllers;

use App\User;
use Activation;
use Validator;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Image;
use Redirect;
use Session;
use Auth;
use Cartalyst\Sentinel\Users\EloquentUser;

class VendorController extends Controller
{

    public function index()
    {
        $role = Sentinel::findRoleById(2);
        $vendors = $role->users()->with('roles')->get();
        return view('admins.show')
            ->with('vendors', $vendors);
    }


    public function landing()
    {
        return view('admin.index');
    }

    public function create()
    {
        return view('vendors.create');
    }

    public function edit($id)
    {
        $vendor = User::find($id);
        return view('vendors.edit')
            ->with('vendor',$vendor);
    }

    public function destroy($id)
    {
        $vendor = User::find($id);
        $vendor -> delete();
        Session::flash('success', 'Successfully deleted');

        return redirect('/vendors');
        //return view('vendors.show')->with('vendor',$vendor);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'name' => 'required|max:255',
            'email' => 'required|max:255|email'
        ));
        $vendor = User::find($id);

        $vendor->name = $request->input('name');
        $vendor->email = $request->input('email');

        $vendor->save();
        Session::flash('success', 'Vendor successfully updated');
        return redirect('/vendors');

    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, EloquentUser::$register_validate);
            $user = Sentinel::register($request->all());
            //$user->name = $request->name;
            //return $user->name;
            //return $request->input('name');
            //return $request->all();
            $activation = Activation::create($user);
            $role = Sentinel::findRoleBySlug('svendor');
            $role->users()->attach($user);

            Session::flash('success', 'Vendor has been successfully created');
            Activation::complete($user,$activation->code);
            return redirect('/vendors');
        } catch (QueryException $e){
            $err = $e->getMessage();
            if( strpos($err, "Duplicate entry") !== false)
                return redirect()->back()->with(['error' => "User ID taken, please register with another email"]);
            else
                return redirect()->back()->with(['error' => $err]);
        }
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