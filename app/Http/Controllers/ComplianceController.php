<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Model\Compliance;
use Illuminate\Http\Request;

class ComplianceController extends Controller
{
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'compliance_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->hasfile('compliance_image'))
        {

            foreach($request->file('compliance_image') as $image)
            {
                $name = $image->getClientOriginalName();
                $image->move(public_path().'/backend/images/compliance', $name);
                $data[] = $name;
            }
        }

        $compliance = new Compliance();
        $compliance->compliance_image = json_encode($data);
        $compliance['title'] = $request->title;
        $compliance['discription'] = $request->discription;


        $compliance->save();


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
    public function destroy()
    {
    }
}
