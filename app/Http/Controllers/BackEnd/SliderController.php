<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Auth;
class SliderController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $sliders = Slider::all();
        return view('backEnd.pages.sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('backEnd.pages.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $request->validate([
            'title'=>'nullable',
            'image'=>'image|required',
            'priority'=>'required|unique:sliders'
        ]);
        $slider = new Slider();
        $slider->title = $request->title;
        $image = $request->image->store('public/slider/images');
        $slider->image = $image;
        $slider->slider_desc = $request->slider_desc;
        $slider->user_id = Auth::user()->id;
        $slider->priority = $request->priority; 
        $slider->button_url = $request->button_url; 
        $slider->save();
        return back()->with('message','Slider is added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function statusChange($id, $status){
       
        $slider = Slider::find($id);
        if($status == true){
            $slider->status = false;
        }
        else{
             $slider->status = true;
        }
        $slider->save();
        return back()->with('message','slider is updated successfully');
    }
}
