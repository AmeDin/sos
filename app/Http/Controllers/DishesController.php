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
use App\Log;
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
        array_shift($ingredients);
        array_pop($ingredients);
        foreach ($ingredients as $ing){
            array_push($ingredients, $ing+1);
            array_shift($ingredients);
        }
        $dish->ingredients()->attach($ingredients);

        $log = new Log;
        $log->createLog("Dish","Create " . $dish->name . " dish", Sentinel::getUser()->id);

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
        $dish = Dish::find($id);
        $ingredients = Ingredient::all()->pluck('name')->toArray();
        return view('dishes.edit')->with('dish',$dish)
            ->with('ingredients',$ingredients);
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, array(
            'name' => 'required|max:255'
        ));
        $dish = Dish::find($id);

        $dish->name = $request->input('name');

        if($request->hasFile('image'))
        {
            $img = $request->file('image');
            $filename = time() . '.' . $img->getClientOriginalName();
            $location = public_path('images/' . $filename);
            Image::make($img)->resize(800, 600)->save($location);

            $image = new \App\Image();
            $image->url = $filename;
            $image->save();

            $dish->image_id = $image->id;

        }

        $dish->save();
        $dish->ingredients()->detach();
        $ingredients = array();
        $req = $request->all();
        foreach ($req as $r) {
            array_push($ingredients, $r);
        };
        array_shift($ingredients);
        array_shift($ingredients);
        array_shift($ingredients);
        if($request->hasFile('image'))
        {
            array_pop($ingredients);
        }
        foreach ($ingredients as $ing){
            array_push($ingredients, $ing+1);
            array_shift($ingredients);
        }
        $dish->ingredients()->attach($ingredients);
        Session::flash('success', 'Dish ' . $dish->name . 'is successfully updated');
        $log = new Log;
        $log->createLog("Dish","Edit " . $dish->name . " dish", Sentinel::getUser()->id);
        return redirect()->route('dishes.show', $dish->id);
    }

    public function destroy($id)
    {
        $dish = Dish::find($id);
        $name = $dish->name;
        $id = $dish->stall_id;
        $dish -> delete();
        Session::flash('success', 'Dish ' . $name . ' is successfully deleted');
        $log = new Log;
        $log->createLog("Dish","Delete " . $name . " dish", Sentinel::getUser()->id);
        return redirect()->route('stalls.show', $id);
    }

}
