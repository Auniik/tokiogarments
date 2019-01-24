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
            return view('frontend.compliance', compact('slug'));
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
        //Validation
        $request->validate([
            'title' => 'required|unique:compliances',
            'homage' => 'required',
            'compliance_image.*' => 'required|image',
            'pdf_document' => 'mimes:pdf',
        ]);

        //Created New Instance
        $compliance = new Compliance();

        //Image Upload
        if($request->hasfile('compliance_image'))
        {
            $data = array();
            foreach($request->file('compliance_image') as $image)
            {
                $path = $image->store(file_path('images/compliance'));
                array_push($data, $path);
            }
        }

        //Pdf Upload
        if ($request->hasFile('pdf_document')){
            $compliance['pdf_document'] = $request->file('pdf_document')->store(file_path('pdf/compliance'));
        }

        //Insert Image
        $compliance->compliance_image = json_encode($data);

        $compliance['title'] = $request->title;
        $compliance['slug'] = str_slug($request->title);
        $compliance['description'] = $request->description;
        $compliance['homage'] = $request->homage;
        $compliance->save();

        return back()->withSuccess('Complience Added');


    }

    /**
     * Display the specified resource.
     *
     * @param  Compliance $compliance
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Compliance $compliance
     * @return \Illuminate\Http\Response
     */
    public function edit(Compliance $compliance)
    {
        return view('backend.compliance.edit', compact('compliance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compliance $compliance)
    {
        $request->validate([
            'title' => 'required|unique:compliances,title,'.$compliance->id,
            'homage' => 'required',
            'compliance_image.*' => 'required|image',
            'pdf_document' => 'mimes:pdf',
        ]);
        if($request->hasfile('compliance_image'))
        {
            $data = array();
            foreach($request->file('compliance_image') as $image)
            {
                $path = $image->store(file_path('images/compliance'));
                array_push($data, $path);
            }

            foreach (json_decode($compliance->compliance_image) as $image){
                Storage::delete($image);
            }
            $compliance->update([$compliance->compliance_image = json_encode($data)]);
        }

        if ($request->hasFile('pdf_document')){
            if($compliance->pdf_document) unlink($compliance->pdf_document);
            $compliance->update(['pdf_document' => $request->file('pdf_document')->store(file_path('pdf/compliance'))]);
        }

        $compliance->update([
            'compliance_image' => $compliance->compliance_image,
            'title'=> $request->title,
            'slug' => str_slug($request->title),
            'description' => $request->description,
            'homage' => $request->homage,
        ]);


        return redirect('compliances')->withSuccess('Complience Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Compliance $compliance
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
