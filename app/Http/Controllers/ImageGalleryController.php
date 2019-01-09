<?php

namespace App\Http\Controllers;

use App\model\PhotoCategory;
use App\model\PhotoGallery;
use App\model\PhotoSubCategory;
use Illuminate\Http\Request;
use Image;

class ImageGalleryController extends Controller
{

    public function index()
    {
        return view('backend.photo_gallery.upload');
    }

    public function create()
    {
        return view('backend.photo_gallery.create-photo',[
            'categories' => PhotoCategory::all(),
            'subcategories' => PhotoSubCategory::all(),
        ]);
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
            'image' => 'required',
            'title' => 'required'
        ]);
        $image=$request->file('image');

        $fileName=$image->hashName();

        $img=Image::make($image)->resize(540,300);
        $img->save('backend/images/gallery');
        $input['image']='backend/images/gallery';


        $gallery = new PhotoGallery();
        $gallery['category']=$request->category;
        $gallery['category_id']=$request->category_id;
        $gallery['sub_category']=$request->sub_category;
        $gallery['image']=$fileName;
        $gallery['discription']=$request->discription;
        $gallery->save();
        return back()->with('success','succfully Inserted');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
