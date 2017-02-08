<?php

namespace App\Http\Controllers;

use App\RoleUser;
use App\User;
use Illuminate\Http\Request;
use Sentinel;
use App\Stall;

class AdminController extends Controller
{

    public function index()
    {
        $role = Sentinel::findRoleById(2);
        $vendors = $role->users()->with('roles')->get();
        return view('admins.show')
            ->with('vendors', $vendors);
    }
    
}