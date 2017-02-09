<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoleUser;
use App\User;
use Sentinel;
use Session;
use App\Ingredient;
use App\Nutrition;
use App\Category;
use Illuminate\Support\Facades\DB;

class IngredientsController extends Controller
{
    public function index()
    {
        $id = 0;
        $ingredients = ingredient::all();
        $categories = category::all();
        return view('ingredients.show')
            ->with('ingredients',$ingredients)
            ->with('categories',$categories)
            ->with('id', $id);
    }
    public function receive(Request $request)
    {
        $id = $request->Category;

        if ($id == "" or $id == 0){
            return redirect()->route('ingredients.index');
        }
        else{
            $ingredients = DB::table('ingredients')->where('category_id', '=', $id)->get();
        }

        $categories = DB::table('categories')->get();

        return view('ingredients.show')
            ->with('ingredients',$ingredients)
            ->with('categories', $categories)
            ->with('id', $id);
    }
    public function create()
    {
        $category = DB::table('categories')->get();

        return view('ingredients.create', ['categorys' => $category]);
    }

    public function store(Request $request)
    {
        $ingredient = new Ingredient();

        $ingredient->category_id = $request->Category;
        $ingredient->name = $request->name;
        $ingredient->price = $request->price;

        $ingredient->save();

        $nutrition = new Nutrition();

        $nutrition->calories = $request->Calories;
        $nutrition->carbohydrate = $request->Carbohydrate;
        $nutrition->saturate_fat = $request->Saturate;
        $nutrition->trans_fat = $request->Trans;
        $nutrition->fibre = $request->Fibre;
        $nutrition->sugar = $request->Sugar;
        $nutrition->protein = $request->Protein;
        $nutrition->ingredient_id = $ingredient->id;

        $nutrition->save();
        Session::flash('success', 'Ingredient is successfully created');
        return redirect()->route('ingredients.index');
    }

    public function edit($id)
    {
        $nutrition = Nutrition::find($id);
        $ingredients = Ingredient::find($id);
        $categories = Category::all();
        // return $nutrition . $ingredients;
        return view('ingredients.edit')
            ->with('ingredients',$ingredients)
            ->with('categories',$categories)
            ->with('nutrition',$nutrition);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));

        $ingredient = Ingredient::find($id);
        $ingredient->category_id = $request->Category;
        $ingredient->name = $request->name;
        $ingredient->price = $request->price;

        $ingredient->save();

        $nutrition = Nutrition::find($id);

        $nutrition->calories = $request->Calories;
        $nutrition->carbohydrate = $request->Carbohydrate;
        $nutrition->saturate_fat = $request->Saturate;
        $nutrition->trans_fat = $request->Trans;
        $nutrition->fibre = $request->Fibre;
        $nutrition->sugar = $request->Sugar;
        $nutrition->protein = $request->Protein;

        $nutrition->save();

        Session::flash('success', 'Ingredient is successfully updated');
        return redirect()->route('ingredients.index');
    }

    public function destroy($id)
    {
        $nutrition = Nutrition::find($id);
        $nutrition -> delete();

        $ingredient = Ingredient::find($id);
        $ingredient -> delete();

        Session::flash('success', 'Ingredient is successfully deleted');
        return redirect()->route('ingredients.index');
    }
}