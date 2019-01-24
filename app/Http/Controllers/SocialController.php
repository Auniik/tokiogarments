<?php

namespace App\Http\Controllers;

use App\Model\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials = Social::orderBy('created_at', 'desc')->paginate();
        return view('backend.social.index', compact('socials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.social.create');
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
            'icon' => 'required',
            'profile_link' => "required|active_url",
        ]);
        Social::create($request->all());
        return back()->withSuccess('Social Link Added Successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function show(Social $social)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function edit(Social $social)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Social $social)
    {
        //
    }

    public function status(Request $request, Social $social)
    {
        if($social->status){
            $social->update(['status' => 0]);

            return back()->withSuccess('Social Link Unpublished');
        }
        else{
            $social->update(['status' => 1]);
            return back()->withSuccess('Social Link Published');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function destroy(Social $social)
    {
        $social->delete();
        return back()->withSuccess('Social Profile deleted');
    }
}
