<?php

namespace App\Http\Controllers;

use App\Model\Equiment;
use Illuminate\Http\Request;
use Image;
use Storage;

class EquimentController extends Controller
{
    //frontend
    public function equipments(){
        $equipments = Equiment::orderBy('created_at', 'desc')->paginate();
        return view('frontend.equipement', compact('equipments'));
    }
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

    // store equipment
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,svg|max:2048',
            'brand' => 'required',
            'quantity' => 'required',
        ]);

        $image = $request->file('image');
        Storage::makeDirectory($path = file_path('images/equipment/'));
        $image_path = $path.$image->hashName();
        Image::make($image)->resize(540, 300)->save($image_path);
        Equiment::create([
            'image' => $image_path,
            'title' => $request->title,
            'brand' => $request->brand,
            'quantity' => $request->quantity,
        ]);

        return back()->with('success', 'Equipment Created Successfully!');

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
    public function update(Request $request, Equiment $equipment)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'mimes:jpg,png,jpeg,svg|max:2048',
            'brand' => 'required',
            'quantity' => 'required',
        ]);
        if ($request->hasFile('image')){
            Storage::delete($equipment->image);
            $image = $request->file('image');
            Storage::makeDirectory($path = file_path('images/equipment/'));
            $image_path = $path.$image->hashName();
            Image::make($image)->resize(540, 300)->save($image_path);
            $equipment->update(['image' => $image_path]);
        }
        $equipment->update([
            'title' => $request->title,
            'brand' => $request->brand,
            'quantity' => $request->quantity,
        ]);
        return redirect('equipment')->withSuccess('Equipment Updated Successfully!');
    }

    // delete Equipment
    public function destroy(Equiment $equipment )
    {
        Storage::delete($equipment->image);
        $equipment->delete();

        return back()->with('success','Successfully Inserted');
    }
}
