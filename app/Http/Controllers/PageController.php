<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Page;

class PageController extends Controller
{
    // all page
    public function index()
    {
        $pages = Page::all();
        return view('backend.page.index',[
            'pages' => $pages,
        ]);
    }

    // create page
    public function create()
    {
        return view('backend.page.create');
    }

    // store data
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required',
            'discription' => 'required',
        ]);

        Page::create([
            'title' => $request->title,
            'url' => $request->url,
            'discription' => $request->discription,
        ]);

        return back()->with('success','Successfully Created');
    }

    // edit page
    public function edit($id)
    {
        $page = Page::find($id);
        return view('backend.page.edit',[
            'page' => $page,
        ]);
    }

    // update
    public function update(Request $request, $id)
    {
        Page::find($id)->update([
            'title' => $request->title,
            'url' => $request->url,
            'discription' => $request->discription,
        ]);

        return back()->with('success','Successfully Updated');
    }

    // delete
    public function destroy($id)
    {
        $page =Page::find($id);
        $page->delete();

        return back()->with('success','Successfully Created');
    }

    // single page
    public function single_page($title){
        $page = Page::find($title);
        return view('front_end.single_page',[
            'page' => $page,
        ]);
    }

}
