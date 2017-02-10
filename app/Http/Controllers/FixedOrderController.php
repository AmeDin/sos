<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Stall;
use Illuminate\Http\Request;
use App\Dish;
use App\FixedOrder;
use Session;
use Sentinel;

class FixedOrderController extends Controller
{
    public function index()
    {
        $orderList = array();
        $earningList = array();
        $totalEarning = 0;

        $orders = FixedOrder::with('dish')->get();

        foreach ($orders as $order){
            $stall = Stall::find($order->dish->stall_id);
            if(Sentinel::getUser()->id == $stall->user_id) {
                array_push($orderList, $order);
                $cost = 0;
                $ingredients = $order->ingredients;
                foreach ($ingredients as $ingredient){
                    $cost += $ingredient->price * $ingredient->pivot->quantity;
                };
                $totalEarning += $cost;
                $cost=number_format($cost, 2, '.', ',');
                array_push($earningList, $cost);
            }
        }
        if(substr($totalEarning, -1)!='0'){
            $totalEarning = $totalEarning . '0';
        }

        return view('vendors.fixed-orders.index')
            ->with('orders',$orderList)
            ->with('earnings', $earningList)
            ->with('total', $totalEarning);
    }

    public function create($id)
    {
        $dish = Dish::find($id);
        $sizePreference = ['Less', 'Standard', 'More'];
        $quantityPreference = [1,2,3,4,5];

        $nutrition = array(
            "Calories"=>0,
            "Carbohydrate"=>0,
            "Saturate fat"=>0,
            "Trans fat"=>0,
            "Fibre"=>0,
            "Sugar"=>0,
            "Protein"=>0);

        foreach($dish->ingredients as $ingredient){
            $nutrition["Calories"] += $ingredient->nutrition->calories;
            $nutrition["Carbohydrate"] += $ingredient->nutrition->carbohydrate;
            $nutrition["Saturate fat"] += $ingredient->nutrition->saturate_fat;
            $nutrition["Trans fat"] += $ingredient->nutrition->trans_fat;
            $nutrition["Fibre"] += $ingredient->nutrition->fibre;
            $nutrition["Sugar"] += $ingredient->nutrition->sugar;
            $nutrition["Protein"] += $ingredient->nutrition->protein;
        }

        return view('customers.fixed-orders.create')
            ->withDish($dish)
            ->with('size', $sizePreference)
            ->with('quantity', $quantityPreference)
            ->with('nutrition', $nutrition);
    }

    public function store(Request $request)
    {
        $order = new FixedOrder();
        $order->dish_id = $request->dish;
        $order->save();

        $defIngredients = array();
        $defIngredientID = array();
        $sides = array();
        $sidesID = array();
        $req = $request->all();
        $reqKey = array_keys($req);
        $reqVal = array_values($req);
        $count = count($req);
        $i = 0;
        while ($i<$count) {
            if(strpos($reqKey[$i], 'ingredient') !== false)
                array_push($defIngredients, $reqVal[$i]);
            if(strpos($reqKey[$i], 'def') !== false)
                array_push($defIngredientID, $reqVal[$i]);
            if(strpos($reqKey[$i], 'newIng') !== false)
                array_push($sidesID, $reqVal[$i]);
            if(strpos($reqKey[$i], 'newSides') !== false)
                array_push($sides, $reqVal[$i]);
            $i++;
        };

        $i = 0;
        $count = count($defIngredients);
        while ($i<$count) {
            $ing = Ingredient::find($defIngredientID[$i]);
            if($ing->category_id == 2 || $ing->category_id == 4){
                $order->ingredients()->attach([$defIngredientID[$i] => ['quantity' => $defIngredients[$i]+1]]);
            }else{
                $order->ingredients()->attach([$defIngredientID[$i] => ['quantity' => $defIngredients[$i]]]);
            }
            $i++;
        }

        $i = 0;
        $count = count($sides);
        while ($i<$count) {
            $order->ingredients()->attach([$sidesID[$i] => ['quantity' => $sides[$i]]]);
            $i++;
        }
        Session::flash('success', 'Order is successfully added');
        return redirect()->route('fixedOrders.show', $order->id);

    }

    public function show($id)
    {
        $order = FixedOrder::find($id);
        $cost = 0;
        $ingredients = $order->ingredients;
        foreach ($ingredients as $ingredient){
            $cost += $ingredient->price * $ingredient->pivot->quantity;
        };
        $cost=number_format($cost, 2, '.', ',');
        return view('customers.fixed-orders.show')
            ->with('order', $order)
            ->with('cost', $cost);
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
