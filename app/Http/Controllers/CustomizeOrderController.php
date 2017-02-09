<?php

namespace App\Http\Controllers;

use App\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\CustomizeOrder;
use Illuminate\Support\Facades\Session;

class CustomizeOrderController extends Controller
{
    public function index()
    {
        //
    }

    public function show($id)
    {
        $order = CustomizeOrder::find($id);
        $cost1 = 0;
        $ingredients = $order->ingredients;
        foreach ($ingredients as $ingredient){
            $cost1 += $ingredient->price * $ingredient->pivot->portion;
            $cost=number_format($cost1, 2, '.', ',');
        };

        return view('customers.customize-orders.ordersummary')
            ->with('order', $order)
            ->with('cost', $cost);

    }


    public function store(Request $request)
    {
        $order = new CustomizeOrder();
        $order->save();

        $selectedIngredients = $request->get('ingredient');
        $selectedPortions = $request->get('portion');
        $arrayIngredient = array();

        foreach ($selectedIngredients as $ingIDs) {

            $getingredient = Ingredient::where('id',$ingIDs)->get();
            for($x = 0; $x < count($getingredient); $x++){
                if ($getingredient[$x]->id = $ingIDs)
                {
                    $test=array_add($getingredient[$x], 'portion',$selectedPortions[$ingIDs]);
                }
                array_push( $arrayIngredient,$test);

            }

        }
        for($x = 0; $x < count($arrayIngredient); $x++) {
            $order->ingredients()->attach([$arrayIngredient[$x]->id => ['portion' => $arrayIngredient[$x]->portion]]);
        }


        Session::flash('success', 'Order is successfully added');
        return redirect()->route('customizeOrders.show', $order->id);
    }


//    public function create1(Request $request)
//    {
//        $selectedIngredients= $request->get('ingredient');
//        $selectedPortions= $request->get('portion');
//        $arrayIngredientDetail = array();
//        $totalprice = 0;
//
//        foreach ($selectedIngredients as $ingIDs) {
//
//            $getingredient = Ingredient::where('id',$ingIDs)->get();
//            for($x = 0; $x < count($getingredient); $x++){
//                if ($getingredient[$x]->id = $ingIDs)
//                {
//                    $getportionprice= $getingredient[$x]->price * $selectedPortions[$ingIDs];
//                    $getportionprice1=number_format($getportionprice, 2, '.', ',');
//                    $test=array_add($getingredient[$x], 'portion',$selectedPortions[$ingIDs]);
//                    array_set($getingredient[$x], 'price', $getportionprice1);
//                }
//             array_push( $arrayIngredientDetail,$test);
//            }
//        }
//        if( count($arrayIngredientDetail) > 0){
//            foreach($arrayIngredientDetail as $ingredient){
//                $totalprice += $ingredient->price;
//                $totalprice1=number_format($totalprice, 2, '.', ',');
//            }
//    }
//        return view('customers.customize-orders.ordersummary')
//            ->with('arrayIngredientDetail', $arrayIngredientDetail)
//        ->with('totalprice1', $totalprice1);
//
//    }


}
