<?php

namespace App\Http\Controllers;

use App\Model\SiteConfiguration;
use Illuminate\Http\Request;

class SiteConfigurationController extends Controller
{
    public function index(){
        $configRecord = SiteConfiguration::first();
        if ($configRecord){
            return $this->edit($configRecord);
        }
        return $this->create();
    }
    public function create()
    {
        return view('backend.basic_config.create');
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required|max:192',
            'phone' => 'required',
            'email' => 'required|email|max:192',
            'meta_description' => 'required',
            'keywords' => 'required',
            'slogan' => 'required',
            'address' => 'required',
            'location' => 'required',
            'facebook_page' => 'required|max:199',
            'logo' => 'required|image',
        ]);
        SiteConfiguration::create([
            'title' => $request->title,
            'phone' => $request->phone,
            'additional_phones' => $request->additional_phones,
            'email' => $request->email,
            'meta_description' => $request->meta_description,
            'keywords' => $request->keywords,
            'slogan' => $request->slogan,
            'address' => $request->address,
            'location' => $request->location,
            'facebook_page' => $request->facebook_page,
            'logo' => $request->logo->store('uploads/images/logo'),
        ]);
        return back()->withSuccess('Site information added.');
    }

    public function edit($configRecord)
    {
        $config =  $configRecord;
        return view('backend.basic_config.edit', compact('config'));
    }
    public function update(Request $request){
        $request->validate([
            'title' => 'required|max:192',
            'phone' => 'required',
            'email' => 'required|email|max:192',
            'meta_description' => 'required',
            'keywords' => 'required',
            'slogan' => 'required',
            'address' => 'required',
            'location' => 'required',
            'facebook_page' => 'required|max:199',
            'logo' => 'image',
        ]);
        $config = SiteConfiguration::first();
        $config->update([
            'title' => $request->title,
            'phone' => $request->phone,
            'additional_phones' => $request->additional_phones,
            'email' => $request->email,
            'meta_description' => $request->meta_description,
            'keywords' => $request->keywords,
            'slogan' => $request->slogan,
            'address' => $request->address,
            'location' => $request->location,
            'facebook_page' => $request->facebook_page,
        ]);
        if ($request->hasFile('logo')) {
            unlink($config->logo);
            $request->logo->storeAs('/', $config->logo);
        }
        return back()->withSuccess('Site information updated.');
    }
}
