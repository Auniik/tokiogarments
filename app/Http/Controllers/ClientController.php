<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Client;
use Image;
use Storage;

class ClientController extends Controller
{
    // all client
    public function index()
    {
        $clients = Client::all();
        return view('backend.client.index',[
            'clients' => $clients,
        ]);
    }

    // create client
    public function create()
    {
        return view('backend.client.create');
    }

    // store client
    public function store(Request $request)
    {
        $request->validate([
            'client_image' => 'required|mimes:jpeg,bmp,png,svg,jpg|max:2048'
        ]);

        $image=$request->file('client_image');

        $extension=$image->getClientOriginalExtension();
        $fileName=rand(1,1000).".".$extension;

        $img=Image::make($image)->resize(120,70);
        $img->save('backend/images/clients'.$fileName);
        $input['client_image']='backend/images/clients'.$fileName;

        Client::create([
            'client_image' => $input['client_image'],
        ]);
        return back()->with('success','Client Successfully Inserted');
    }


    // edit client
    public function edit($id)
    {
        $client = Client::find($id);
        return view('backend.client.edit',[
            'client' => $client,
        ]);
    }

    // update client image
    public function update(Request $request, $id)
    {
        $request->validate([
            'client_image' => 'max:2048'
        ]);

        $client = Client::find($id);

        Storage::delete($client->client_image);
        $image=$request->file('client_image');

        $extension=$image->getClientOriginalExtension();
        $fileName=rand(1,1000).".".$extension;

        $img=Image::make($image)->resize(120,70);
        $img->save('backend/images/clients'.$fileName);
        $input['client_image']='backend/images/clients'.$fileName;

        $client->update([
            'client_image' => $input['client_image'],
        ]);

        return back()->with('success','Client Successfully Updated');
    }

    // delete client
    public function destroy($id)
    {
        $client = Client::find($id);
        Storage::delete($client->client_image);
        $client->delete();
        return back()->with('success','Client Successfully Deleted');

    }
}
