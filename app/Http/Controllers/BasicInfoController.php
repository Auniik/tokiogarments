<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\BasicInfo;

class BasicInfoController extends Controller
{
    // basic info
    public function index()
    {
        $config = BasicInfo::find(1);
        return view('backend.basic.index',[
            'config' => $config,
        ]);
    }


    // update info
    public function update(Request $request, $id)
    {
        $request->validate([
            'logo' => 'max:2048',
        ]);
        $config = BasicInfo::find(1);

        if($request->hasFile('logo')){
            $path = $request->file('logo')->storeAs('backend/images','FxDE2Nv5OpYfKu2LsDQI87ohzmYdNAOcVAELu6DF.png');
            $config['logo'] = $path;
        }
        $config->save();

        BasicInfo::find(1)->update([
            'title' => $request->title,
            'phone' => $request->phone,
            'email' => $request->email,
            'meta_discription' => $request->meta_discription,
            'keywords' => $request->keywords,
            'slogan' => $request->slogan,
            'address' => $request->address,
            'location' => $request->location,
            'facebook_page' => $request->facebook_page,
        ]);

        return back()->with('success','Successfully Updated');
    }
    public function show(BasicInfo $config)
    { 
        //
    }
}
