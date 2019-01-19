<?php

namespace App\Http\Controllers\Production;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ProductionUnit;

class ProductionUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productionUnits = ProductionUnit::paginate();
        return view('backend.production.index', compact('productionUnits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'name' => 'required',
            'slug' => 'required|unique:production_units',
            'space' => 'required|max:50',
            'capacity' => 'required|max:50',
            'image_details' => 'required|max:190',
        ]);
        $data['name'] = $request->name;
        $data['slug'] = str_slug($request->slug);
        $data['space'] = $request->space;
        $data['capacity'] = $request->capacity;
        $data['image_details'] = $request->image_details;
        $data['status'] = $request->status;
        ProductionUnit::create($data);
        return back()->withSuccess('Production unit added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  ProductionUnit $productionUnit
     * @return \Illuminate\Http\Response
     */
    public function show(ProductionUnit $productionUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ProductionUnit $productionUnit
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductionUnit $productionUnit)
    {
        return view('backend.production.edit', compact( 'productionUnit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ProductionUnit $productionUnit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductionUnit $productionUnit)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:production_units',
            'space' => 'required|max:50',
            'capacity' => 'required|max:50',
            'image_details' => 'required|max:190',
        ]);
        $data['name'] = $request->name;
        $data['slug'] = str_slug($request->slug);
        $data['space'] = $request->space;
        $data['capacity'] = $request->capacity;
        $data['image_details'] = $request->image_details;
        $productionUnit->update($data);
        return back()->withSuccess('Production unit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ProductionUnit $productionUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductionUnit $productionUnit)
    {
        //
    }
}
