<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;

class FixedOrderController extends Controller
{
    public function index()
    {
        //
    }

    public function create($id)
    {
        $dish = Dish::find($id);
        $sizePreference = ['Less', 'Standard', 'More'];
        $quantityPreference = [1,2,3,4,5];
        return view('customers.fixed-orders.create')
            ->withDish($dish)
            ->with('size', $sizePreference)
            ->with('quantity', $quantityPreference);
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
