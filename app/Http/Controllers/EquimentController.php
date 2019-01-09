<?php

namespace App\Http\Controllers;

use App\Model\Equiment;
use Illuminate\Http\Request;
use Image;
use Storage;

class EquimentController extends Controller
{
    // equipment
    public function index()
    {
        $equipments = Equiment::all();
        return view('backend.equiment.index',[
           'equipments' => $equipments,
        ]);
    }

    // create equipment
    public function create()
    {
        return view('backend.equiment.create');
    }

    // store image
    protected function image(){

    }

    // store equipment
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'equipment_image' => 'required|mimes:jpg,png,jpeg,svg|max:2048',
            'brand' => 'required',
            'quantity' => 'required',
        ]);

        $image=$request->file('equipment_image');

        $fileName=$image->hashName();

        $img=Image::make($image)->resize(540,300);
        $img->save('backend/images/equipment'.$fileName);
        $input['equipment_image']='backend/images/equipment'.$fileName;

        Equiment::create([
            'image' => $input['equipment_image'],
            'title' => $request->title,
            'brand' => $request->brand,
            'quantity' => $request->quantity,
        ]);

        return back()->with('success','Successfully Inserted');

    }


    // edit equipment
    public function edit($id)
    {
        $equipment = Equiment::find($id);
        return view('backend.equiment.edit',[
            'equipment' => $equipment,
        ]);
    }

    // update equipment
    public function update(Request $request, $id)
    {
        $request->validate([
            'equipment_image' => 'max:2048',
        ]);
        $equipment = Equiment::find($id);

        Storage::delete($equipment->image);

        $image=$request->file('equipment_image');

        $fileName=$image->hashName();

        $img=Image::make($image)->resize(540,300);
        $img->save('backend/images/equipment'.$fileName);
        $input['equipment_image']='backend/images/equipment'.$fileName;

        $equipment->update([
            'image' => $input['equipment_image'],
            'title' => $request->title,
            'brand' => $request->brand,
            'quantity' => $request->quantity,
        ]);

        return back()->with('success','Successfully Inserted');
    }

    // delete Equipment
    public function destroy($id)
    {
        $equipment = Equiment::find($id);
        Storage::delete($equipment->image);
        $equipment->delete();

        return back()->with('success','Successfully Inserted');
    }
}
