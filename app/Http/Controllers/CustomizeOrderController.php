<?php

namespace App\Http\Controllers;

use App\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CustomizeOrderController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Request $request)
    {

        $selectedIngredients= $request->get('ingredient');
        $selectedPortions= $request->get('portion');
        $arrayIngredientDetail = array();
        $totalprice = 0;
        foreach ($selectedIngredients as $ingIDs) {

            $getingredient = Ingredient::where('id',$ingIDs)->get();

            array_push( $arrayIngredientDetail,$getingredient);

        }

        for($x = 0; $x < count($arrayIngredientDetail); $x++){
            if($arrayIngredientDetail[$x]->count() > 0)
                foreach($arrayIngredientDetail[$x] as $ingredient){
                    $totalprice += $ingredient->price;
                }
        }

        return view('customers.customize-orders.ordersummary')
            ->with('arrayIngredientDetail', $arrayIngredientDetail)
            ->with('totalprice', $totalprice);

    }

    public function store(Request $request)
    {

    }
}