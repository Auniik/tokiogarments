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
            'title' => 'required|unique:pages',
            'description' => 'required',
        ]);
        Page::create([
            'title' => $request->title,
            'url' => str_slug($request->title),
            'description' => $request->description,
        ]);

        return back()->with('success', 'Successfully Created');
    }

    // edit page
    public function edit(Page $page)
    {
        return view('backend.page.edit', compact('page'));
    }

    // update
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required|unique:pages,url,'.$page->id,
        ]);
        $page->update([
            'title' => $request->title,
            'url' => str_slug($request->url),
            'description' => $request->description,
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
