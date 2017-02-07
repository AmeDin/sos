<?php

namespace App\Http\Controllers;

use App\Ingredient;
use Illuminate\Http\Request;

class CustomizeOrderController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {

        return view('customers.customize-orders.ordersummary');
    }

    public function store(Request $request)
    {

    }
}
