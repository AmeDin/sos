<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Stall;
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
        $order->stall_id = $request->stall_id;
        $order->save();

        $selectedIngredients = $request->get('ingredient');
        $selectedPortions = $request->get('portion');
        $arrayIngredient = array();

        foreach ($selectedIngredients as $ingIDs) {

            $getingredient = Ingredient::where('id', $ingIDs)->get();
            for ($x = 0; $x < count($getingredient); $x++) {
                if ($getingredient[$x]->id = $ingIDs) {
                    $test = array_add($getingredient[$x], 'portion', $selectedPortions[$ingIDs]);
                }
                array_push($arrayIngredient, $test);

            }

        }
        for ($x = 0; $x < count($arrayIngredient); $x++) {
            $order->ingredients()->attach([$arrayIngredient[$x]->id => ['portion' => $arrayIngredient[$x]->portion]]);
        }


        Session::flash('success', 'Order is successfully added');
        return redirect()->route('customizeOrders.show', $order->id);
    }

    public function showorder($id)
    {
        $stalls = Stall::find($id);
        $orders = CustomizeOrder::all();


        $eachorder=array();
            foreach( $orders as $order) {
                $orderlist = CustomizeOrder::where('stall_id', $id)->where('id', $order->id)->get();
                array_push($eachorder, $orderlist);
                $cost1 = 0;
                $totalcost1=0;
                foreach ($orderlist as $list){
                    $ingredients= $list->ingredients;
                    foreach ($ingredients as $ingredient){
                        $cost1 += $ingredient->price * $ingredient->pivot->portion;
                        $cost=number_format($cost1, 2, '.', ',');




                    } $totalcost1+= $totalcost1 + $cost1;
                    $totalcost=number_format($totalcost1, 2, '.', ',');
                }

            }





        return view('vendors.orderlist')
        ->with('order', $eachorder)
        ->with('price', $cost)
        ->with('totalprice', $totalcost)
         ->withStalls($stalls);






//        foreach( $orders as $order)
//        {
//            $orderlist = CustomizeOrder::where('id',$order)->get();
//        }

//        $order = CustomizeOrder::all();
//        $cost1 = 0;
//        $ingredient = $order->ingredients;
//
//
//        foreach ($ingredients as $ingredient){
//            $cost1 += $ingredient->price * $ingredient->pivot->portion;
//            $cost=number_format($cost1, 2, '.', ',');
//        };
//
//        return view('customers.customize-orders.ordersummary')
//            ->with('order', $order)
//            ->with('cost', $cost);
    }




}
