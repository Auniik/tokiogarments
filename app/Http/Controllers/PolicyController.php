<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Policy;
use Storage;
use Image;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $policy = Policy::first();
        if ($policy){
            return $this->edit($policy);
        }
        return $this->create();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.basic.policy.create');
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
            'heading' => 'required',
            'meta_description' => 'required',
            'policy_description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,svg|max:2048',
        ]);
        $image = $request->file('image');
        Storage::makeDirectory($path = file_path('images/policy/'));
        $image_path = $path.$image->hashName();
        Image::make($image)->resize(540, 300)->save($image_path);
        $data['heading'] = $request->heading;
        $data['meta_description'] = $request->meta_description;
        $data['policy_description'] = $request->policy_description;
        $data['image'] = $image_path;
        
        Policy::create($data);
        return back()->withSuccess('Policy Added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function edit(Policy $policy)
    {
        return view('backend.basic.policy.edit', compact('policy'));
    }


}
