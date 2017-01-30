<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stall;
use App\Dish;

class CustomerController extends Controller
{
    public function index()
    {
        $stalls = Stall::all();
        return view('customers.stalls')
            ->withStalls($stalls);
    }

    public function stallHome($id)
    {
        $stall = Stall::find($id);
        return view('customers.stall-home')
            ->with('name', $stall->name)
            ->with('id', $stall->id);
    }

    public function stallMains($id){
        $stalls = Stall::find($id);
        $dishes = Dish::where('stall_id', $id)->get();
        return view('customers.stall-mains')
            ->withStalls($stalls)
            ->withDishes($dishes);
    }
}
