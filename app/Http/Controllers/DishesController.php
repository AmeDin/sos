<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingredient;
use App\Dish;
use Image;
use Validator;
use Redirect;
use Session;
use Auth;
use Sentinel;
use App\Stall;
use Illuminate\Support\Facades\URL;

class DishesController extends Controller
{

    public function index()
    {
        return Dish::all();
    }

    public function create()
    {
        $stall_id = strrev(substr(strrev(URL::previous()), 0, strpos(strrev(URL::previous()), '/')));
        $ingredients = Ingredient::all()->pluck('name')->toArray();
        return view('dishes.create')
            ->with('ingredients',$ingredients)
            ->with('stall_id', $stall_id);
    }

    public function store(Request $request)
    {
        $dish = new Dish();
        $dish->name = $request->name;
        $dish->stall_id = $request->stall;



        if($request->hasFile('image'))
        {
            $img = $request->file('image');
            $filename = time() . '.' . $img->getClientOriginalName();
            $location = public_path('images/' . $filename);
            Image::make($img)->resize(400, 400)->save($location);

            $image = new \App\Image();
            $image->url = $filename;
            $image->save();

            $dish->image_id = $image->id;

        }

        $dish->save();

        $ingredients = array();
        $req = $request->all();
        foreach ($req as $r) {
            array_push($ingredients, $r);
        };
        array_shift($ingredients);
        array_shift($ingredients);
        array_pop($ingredients);
        $dish->ingredients()->attach($ingredients);

        Session::flash('success', 'Dish is successfully added');
        return redirect()->route('dishes.show', $dish->id);
    }

    public function show($id)
    {
        $dish = Dish::find($id);

        $calories = 0;
        $carbohydrate = 0;
        $saturate_fat = 0;
        $trans_fat = 0;
        $fibre = 0;
        $sugar = 0;
        $protein= 0;


        $ingredient= $dish->ingredients;
        foreach($ingredient as $n){
            $calories += $n->nutrition->calories;
            $carbohydrate += $n->nutrition->carbohydrate;
            $saturate_fat += $n->nutrition->saturate_fat;
            $trans_fat += $n->nutrition->trans_fat;
            $fibre += $n->nutrition->fibre;
            $sugar += $n->nutrition->sugar;
            $protein += $n->nutrition->protein;
        }

        $nutritionJSON = '{"nutrition": [
                        {
                            "name": "Calories",
                            "value": "' .  strval($calories) . '"
                        },
                        {
                            "name": "Carbohydrate",
                            "value": "' . strval($carbohydrate) . '"
                        },
                        {
                            "name": "Saturate Fat",
                            "value": "' . strval($saturate_fat) . '"
                        },
                        {
                            "name": "Trans Fat",
                            "value": "' . strval($trans_fat) . '"
                        },
                        {
                            "name": "Fibre",
                            "value": "' . strval($fibre) . '"
                        },
                        {
                            "name": "Sugar",
                            "value": "' . strval($sugar) . '"
                        },
                        {
                            "name": "Protein",
                            "value": "' . strval($protein) . '"
                        }
                    ]}';

        $nutrition = json_decode($nutritionJSON,TRUE);
        return view('dishes.show')
            ->with('nutrition',$nutrition)
            ->with('dish', $dish);
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
