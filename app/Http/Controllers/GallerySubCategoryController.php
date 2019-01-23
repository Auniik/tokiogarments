<?php

namespace App\Http\Controllers;

use App\model\PhotoCategory;
use App\model\PhotoSubCategory;
use Illuminate\Http\Request;

class GallerySubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $galleries = PhotoSubCategory::where('category_id', $id)->get();
//        dd($galleries->category);
        return view('backend.photo_gallery.subcategory.index', compact('galleries','id'));
    }

    // store data
    public function store(Request $request)
    {
        $subcategory = new PhotoSubCategory();
        $subcategory['sub_category_name'] = $request->name;
        $subcategory['category_id'] = $request->category_id;
        $subcategory->save();
        return back()->withSuccess('Subcategory Added Successfully');
    }


    public function edit($id)
    {
        $subcategory = PhotoSubCategory::find($id);
        return view('backend.photo_gallery.subcategory.edit',compact('subcategory'));
    }


    public function update(Request $request, $id)
    {
        $subcategory = PhotoSubCategory::find($id);
        $subcategory['sub_category_name'] = $request->name;
        $subcategory['category_id'] = $request->category_id;
        $subcategory->save();
        return back()->withSuccess('Successfully Updated');
    }


    public function destroy($id)
    {
        PhotoSubCategory::find($id)->delete();
        return back()->withSuccess('Subcategory Deleted Successfully.');
    }
}
