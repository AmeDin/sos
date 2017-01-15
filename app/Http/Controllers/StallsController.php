<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stall;
use Input;
use Validator;
use Redirect;
use Session;
use Auth;
use Sentinel;
use Image;
use App\Dish;

class StallsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stalls = Stall::where('user_id', Sentinel::getUser()->id)->get();

        return view('vendors.landing')
                    ->withStalls($stalls)
                    ->with('count', 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stalls.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stall = new Stall;
        $stall->user_id = Sentinel::getUser()->id;
        $stall->name = $request->name;

        if($request->hasFile('image'))
        {
            $img = $request->file('image');
            $filename = time() . '.' . $img->getClientOriginalName();
            $location = public_path('images/' . $filename);
            Image::make($img)->resize(800, 600)->save($location);

            $image = new \App\Image();
            $image->url = $filename;
            $image->save();

            $stall->image_id = $image->id;

        }

        $stall->save();

        Session::flash('success', 'Stall is successfully created');
        return redirect()->route('stalls.show', $stall->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stall = Stall::find($id);
        $dishes = Dish::where('stall_id', $id)->get();
        return view('stalls.show')
                ->with('stall', $stall)
                ->with('dishes', $dishes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stall = Stall::find($id);
        return view('stalls.edit')->with('stall',$stall);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));
        $stall = Stall::find($id);

        $stall->name = $request->input('name');

        if($request->hasFile('image'))
        {
            $img = $request->file('image');
            $filename = time() . '.' . $img->getClientOriginalName();
            $location = public_path('images/' . $filename);
            Image::make($img)->resize(800, 600)->save($location);

            $image = new \App\Image();
            $image->url = $filename;
            $image->save();

            $stall->image_id = $image->id;

        }

        $stall->save();
        Session::flash('success', 'Stall is successfully updated');
        return redirect()->route('stalls.show', $stall->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stall = Stall::find($id);
        $stall -> delete();
        Session::flash('success', 'Stall is successfully deleted');
        return redirect()->route('vendorhome');
    }
}
