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
            'slider_image' => 'required|image|max:2048'
        ]);

        $image = $request->file('slider_image');
        Storage::makeDirectory($path = file_path('images/slider_images/'));
        $image_path = $path.$image->hashName();
        Image::make($image)->resize(1600,800)->save($image_path);

        Slider::create([
            'slider_image' => $image_path
        ]);
        return back()->withSuccess('Image for Slider Successfully Added');

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
    public function update(Request $request,Slider $slider)
    {
        $request->validate([
            'slider_image' => 'image'
        ]);

        if ($request->hasFile('slider_image')){
            Storage::delete($slider->image);
            $image = $request->file('slider_image');
            Storage::makeDirectory($path = file_path('images/slider_images/'));
            $image_path = $path.$image->hashName();
            Image::make($image)->resize(1600, 800)->save($image_path);
            $slider->update(['slider_image' => $image_path]);
        }
        return back()->withSuccess('Image for Slider Successfully Updated');
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
