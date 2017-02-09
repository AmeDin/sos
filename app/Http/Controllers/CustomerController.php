<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stall;
use App\Dish;
use App\Ingredient;
use App\Promotion;
use Carbon\Carbon;

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

    public function stallPromotion($id)
    {
        $stalls = Stall::find($id);
        $promotions = Promotion::where('stall_id', $id)->get();
        $todaydate = Carbon::today()->format('Y-m-d');
        return view('customers.stall-promotion')
            ->withStalls($stalls)
            ->with('promotions',$promotions)
            ->with('todaydate',$todaydate);
    }

    public function stallCustomize($id)
    {
        $stalls = Stall::find($id);

        $ingredientsStaple = Ingredient::where('category_id', '1')->get();
        $ingredientsMeat = Ingredient::where('category_id', '2')->get();
        $ingredientsVegetable = Ingredient::where('category_id', '3')->get();
        $ingredientsSeafood = Ingredient::where('category_id', '4')->get();
        $ingredientsNut = Ingredient::where('category_id', '5')->get();
        $ingredientsSauce = Ingredient::where('category_id', '6')->get();
        $ingredientsDrink = Ingredient::where('category_id', '7')->get();


        return view('customers.stall-customize')
            ->withStalls($stalls)
            ->with('staple', $ingredientsStaple)
            ->with('meat', $ingredientsMeat)
            ->with('vegetable', $ingredientsVegetable)
            ->with('seafood', $ingredientsSeafood)
            ->with('nut', $ingredientsNut)
            ->with('sauce', $ingredientsSauce)
            ->with('drink', $ingredientsDrink);


    }
}
