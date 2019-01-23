<?php

namespace App\Http\Controllers;

use App\model\PhotoCategory;
use Illuminate\Http\Request;

class GalleryCategoryController extends Controller
{

    public function index()
    {
        $galleries = PhotoCategory::all();
        return view('backend.photo_gallery.index',compact('galleries'));
    }


    public function store(Request $request)
    {
        $category = new PhotoCategory();
        $category['category_name'] = $request->gallery_name;
        $category->save();
        return back()->withSuccess('Photo Galerry Added Successfully.');
    }

    public function edit($id)
    {
        $category = PhotoCategory::find($id);
        return view('backend.photo_gallery.edit',compact('category'));
    }


    public function update(Request $request, $id)
    {
        $category = PhotoCategory::find($id);

        $category['category_name'] = $request->gallery_name;

        $category->save();
        return back()->withSuccess('Successfully Updated');
    }


    public function destroy($id)
    {
        PhotoCategory::find($id)->delete();
        return back()->with('delete','Successfully Delete');
    }
}
