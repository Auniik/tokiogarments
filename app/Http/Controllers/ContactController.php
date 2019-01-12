<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('frontend.contact');
    }
    public function send(Request $request){
        $request->validate([
           'name' => 'required|min:4',
           'email' => 'required|email',
           'message' => 'required',
        ]);
        $input = $request->all();
        Contact::create($input);
        return redirect('contact')->withSuccess('Thank you. We\'ll notify you soon');
    }
    public function messages(){
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(5);
        return view('backend.index', compact('contacts'));
    }

    public function destroy(Contact $contact){
        $contact->delete();
        return back()->withSuccess('Message Deleted');
    }
}
