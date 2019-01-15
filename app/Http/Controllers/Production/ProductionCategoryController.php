<?php

namespace App\Http\Controllers\Production;

use App\Model\ProductionCategory;
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

        $productionCategories = ProductionCategory::where('status', 1)->get();
        return view('backend.production.category.index', compact('productionCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductionCategory::where('status', 1)->get();

        return view('backend.production.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        //
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
        //
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
