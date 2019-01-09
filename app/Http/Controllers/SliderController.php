<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Slider;
use Image;
use Storage;

class SliderController extends Controller
{
    // all slider
    public function index()
    {
        $sliders = Slider::all();
        return view('backend.slider.index',[
            'sliders' => $sliders,
        ]);
    }

    // create slider
    public function create()
    {
        return view('backend.slider.create');
    }

    // slider store
    public function store(Request $request)
    {
        $request->validate([
            'slider_image' => 'required|mimes:jpeg,bmp,png,svg,jpg|max:2048'
        ]);

        $image=$request->file('slider_image');

        $extension=$image->getClientOriginalExtension();
        $fileName=rand(1,1000).".".$extension;

        $img=Image::make($image)->resize(1920,450);
        $img->save('backend/images/sliders'.$fileName);
        $input['slider_image']='backend/images/sliders'.$fileName;

        Slider::create([
            'slider_image' => $input['slider_image'],
        ]);
        return back()->with('success','Slider Successfully Inserted');

    }

    //edit slider
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('backend.slider.edit',[
            'slider' => $slider,
        ]);
    }
    // update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'slider_image' => 'max:2048'
        ]);

        $slider = Slider::find($id);

        Storage::delete($slider->slider_image);

        $image=$request->file('slider_image');

        $extension=$image->getClientOriginalExtension();
        $fileName=rand(1,1000).".".$extension;

        $img=Image::make($image)->resize(1920,450);
        $img->save('backend/images/sliders'.$fileName);
        $input['slider_image']='backend/images/sliders'.$fileName;

        Slider::find($id)->update([
            'slider_image' => $input['slider_image'],
        ]);
        return back()->with('success','Slider Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        Storage::delete($slider->slider_image);
        return back()->with('success','Slider Successfully Deleted');
    }
}
