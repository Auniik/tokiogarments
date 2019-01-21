<?php

namespace App\Http\Controllers;

use App\Model\Compliance;
use Illuminate\Http\Request;
use Storage;

class ComplianceController extends Controller
{

    public function view(Compliance $slug)
    {
        if ($slug->slug){
            dd($slug);
            return view('fontend.compliance', compact('slug'));
        }


    }
    // compliance
    public function index()
    {
        $compliances = Compliance::all();
        return view('backend.compliance.index',[
            'compliances' => $compliances,
        ]);
    }

    // create compliance
    public function create()
    {
        return view('backend.compliance.create');
    }

    // store compliance

    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:compliances',
            'compliance_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($request->hasfile('compliance_image'))
        {
            $data = array();
            foreach($request->file('compliance_image') as $image)
            {
                $path = $image->store(file_path('images/compliance'));
                array_push($data, $path);
            }
        }
        $compliance = new Compliance();
        $compliance->compliance_image = json_encode($data);
        $compliance['title'] = $request->title;
        $compliance['slug'] = str_slug($request->title);
        $compliance['description'] = $request->description;
        $compliance->save();

        return back()->withSuccess('Complience Added');


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
    public function destroy(Compliance $compliance)
    {

        foreach (json_decode($compliance->compliance_image) as $image){
            Storage::delete($image);
        }
        $compliance->delete();

        return back()->with('success','Successfully Deleted');
    }
}
