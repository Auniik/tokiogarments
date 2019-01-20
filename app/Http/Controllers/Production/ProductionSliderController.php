<?php

namespace App\Http\Controllers\Production;

use App\Model\ProductionSlider;
use App\Model\ProductionUnit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use Storage;

class ProductionSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productionSlider = ProductionSlider::orderBy('production_unit_id', 'asc')->paginate(10);
        return view('backend.production.slider.index', compact('productionSlider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productionUnits = ProductionUnit::where('status', 1)->get();
        return view('backend.production.slider.create', compact('productionUnits'));
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
            'image' => 'required|mimes:jpg,png,jpeg,svg|max:2048',
            'production_unit_id' => 'required',
        ]);
        $image = $request->file('image');
        Storage::makeDirectory($path = file_path('images/production_unit/'));
        $image_path = $path.$image->hashName();
        Image::make($image)->resize(500, 500)->save($image_path);
        ProductionSlider::create([
            'image' => $image_path,
            'production_unit_id' => $request->production_unit_id,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Production image Created Successfully!');
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
     * @param  ProductionSlider  $productionSlider
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductionSlider $productionSlider)
    {
        $productionUnits = ProductionUnit::where('status', 1)->get();
        return view('backend.production.slider.edit', compact( 'productionSlider', 'productionUnits'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ProductionSlider $productionSlider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductionSlider $productionSlider)
    {
        $request->validate([
            'image' => 'mimes:jpg,png,jpeg,svg|max:2048',
            'production_unit_id' => 'required',
        ]);
        if ($request->hasFile('image')){
            Storage::delete($productionSlider->image);
            $image = $request->file('image');
            Storage::makeDirectory($path = file_path('images/production_unit/'));
            $image_path = $path.$image->hashName();
            Image::make($image)->resize(500, 500)->save($image_path);
            $productionSlider->update(['image' => $image_path]);
        }
        $productionSlider->update([
            'production_unit_id' => $request->production_unit_id,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Production image updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ProductionSlider $productionSlider
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductionSlider $productionSlider)
    {
        //
    }
}
