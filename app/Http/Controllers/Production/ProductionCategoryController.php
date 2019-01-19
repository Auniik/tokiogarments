<?php

namespace App\Http\Controllers\Production;

use App\Model\ProductionCategory;
use App\Model\ProductionUnit;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productionUnits = ProductionUnit::where('status',1)->get();
        $productionCategories = ProductionCategory::paginate();
        return view('backend.production.category.index', compact('productionCategories','productionUnits'));
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
            'production_unit_id' => 'required',
        ]);
//        dd($request->all());
        ProductionCategory::create($request->all());
        return back()->withSuccess('Category for Production unit added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  ProductionCategory $productionCategory
     * @return \Illuminate\Http\Response
     */
//    public function show(ProductionCategory $productionCategory)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ProductionCategory $productionCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductionCategory $productionCategory)
    {
        $productionUnits = ProductionUnit::where('status',1)->get();
        return view('backend.production.category.edit', compact('productionUnits', 'productionCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ProductionCategory $productionCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductionCategory $productionCategory)
    {
        $request->validate([
            'name' => 'required',
            'production_unit_id' => 'required',
        ]);
//        dd($request);
        $productionCategory->update($request->all());
        return back()->withSuccess('Category for Production unit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ProductionCategory $productionCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductionCategory $productionCategory)
    {
        //
    }
}
