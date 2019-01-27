<?php

namespace App\Http\Controllers\Production;

use App\Model\ProductionEquipment;
use App\Model\ProductionUnit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductionEquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productionUnits = ProductionUnit::get();
        $productionEquipments = ProductionEquipment::where('status',1)->orderBy('production_unit_id', 'asc')->paginate(20);
        return view('backend.production.equipment.index', compact('productionUnits','productionEquipments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.production.equipment.create');
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
            'item' => 'required',
            'quantity' => 'required',
            'production_unit_id' => 'required',
        ]);
        ProductionEquipment::create($request->all());
        return back()->withSuccess('Equipment for Production unit added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  ProductionEquipment $productionEquipment
     * @return \Illuminate\Http\Response
     */
    public function show(ProductionEquipment $productionEquipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ProductionEquipment $productionEquipment
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductionEquipment $productionEquipment)
    {
        $productionUnits = ProductionUnit::where('status', 1)->get();
        return view('backend.production.equipment.edit', compact('productionUnits', 'productionEquipment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ProductionEquipment $productionEquipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductionEquipment $productionEquipment)
    {
        $request->validate([
            'item' => 'required',
            'quantity' => 'required',
            'production_unit_id' => 'required',
        ]);

        $productionEquipment->update($request->all());
        return back()->withSuccess('Category for Production unit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ProductionEquipment $productionEquipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductionEquipment $productionEquipment)
    {
        $productionEquipment->delete();
        return back()->withSuccess('Equipment Deleted');
    }
}
