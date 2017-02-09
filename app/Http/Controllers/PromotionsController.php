<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;
use App\Stall;
use App\Ingredient;
use Image;
use Validator;
use Redirect;
use Session;
use Auth;
use Sentinel;
use App\Log;
use Illuminate\Support\Facades\URL;

class PromotionsController extends Controller
{
    public function index()
    {
        $promotions = Stall::where('stall_id', Sentinel::getUser()->id)->get();
        return view('vendors.landing')
            ->withStalls($promotions)
            ->with('count', 0);
    }

    public function show($id)
    {
        $stall = Stall::find($id);
        $promotions = Promotion::where('stall_id', $id)->get();
        return view('promotions.show')
            ->with('stall', $stall)
            ->with('promotions', $promotions);
    }
    public function create()
    {
        $stall_id = basename(URL::previous());
        return view('promotions.create')
            ->with('stall_id', $stall_id);

    }

    public function store(Request $request)
    {
        // return $request->all();
        $promotion = new Promotion();
        $promotion->name = $request->name;
        $promotion->description = $request->description;
        $promotion->start_date = $request->startdate;
        $promotion->end_date = $request->enddate;
        $promotion->stall_id = $request->stall;





        if($request->hasFile('image'))
        {
            $img = $request->file('image');
            $filename = time() . '.' . $img->getClientOriginalName();
            $location = public_path('images/' . $filename);
            Image::make($img)->resize(400, 400)->save($location);

            $image = new \App\Image();
            $image->url = $filename;
            $image->save();

            $promotion->image_id = $image->id;

        }

        $promotion->save();
        $log = new Log;
        $log->createLog("Promotion","Create " . $promotion->name . " promotion", Sentinel::getUser()->id);
        Session::flash('success', 'Promotion is successfully added');
        return redirect()->route('promotions.show', $promotion->stall_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promotions = Promotion::find($id);
        return view('promotions.edit')->with('stall',$promotions);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));
        $promotions = Promotion::find($id);

        $promotions->name = $request->input('name');
        $promotions->description = $request->input('description');
        $promotions->start_date = $request->input('startdate');
        $promotions->end_date = $request->input('enddate');

        if($request->hasFile('image'))
        {
            $img = $request->file('image');
            $filename = time() . '.' . $img->getClientOriginalName();
            $location = public_path('images/' . $filename);
            Image::make($img)->resize(800, 600)->save($location);

            $image = new \App\Image();
            $image->url = $filename;
            $image->save();

            $promotions->image_id = $image->id;

        }

        $promotions->save();
        Session::flash('success', 'Promotion for stall is successfully updated');
        $log = new Log;
        $log->createLog("Promotion","Edit " . $promotions->name . " promotion", Sentinel::getUser()->id);
        return redirect()->route('promotions.show', $promotions->id);

    }
    public function destroy($id)
    {
        $promotions = Promotion::find($id);
        $promotions -> delete();
        Session::flash('success', 'Promotion is successfully deleted');
        $log = new Log;
        $log->createLog("Promotion","Delete " . $promotions->name . " promotion", Sentinel::getUser()->id);
        return redirect()->route('promotions.show', $promotions->id);
    }
}
