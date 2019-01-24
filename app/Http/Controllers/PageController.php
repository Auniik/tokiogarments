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
        return view('backend.page.index', compact('pages'));
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
            'name' => 'required',
            'title' => 'required',
            'slug' => 'required|unique:pages',
            'pdf_document' => 'mimes:pdf',
        ]);
        //Pdf Upload
        $page = new Page();
        if ($request->hasFile('pdf_document')){
            $page['pdf_document'] = $request->file('pdf_document')->store(file_path('pdf/page'));
        }
        str_slug($request->slug) == null ? $slug="#" : $slug = $request->slug;
        $page['name'] = $request->name;
        $page['title'] = $request->title;
        $page['slug'] = $slug;
        $page['description'] = $request->description;
        $page->save();

        return back()->withSuccess('Page Added Successfully');
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
            'name' => 'required',
            'title' => 'required',
            'slug' => 'required|unique:pages,slug,'.$page->id,
            'pdf_document' => 'mimes:pdf',
        ]);
        if ($request->hasFile('pdf_document')){
            if ($page->pdf_document) unlink($page->pdf_document);
            $page['pdf_document'] = $request->file('pdf_document')->store(file_path('pdf/page'));
        }
        str_slug($request->slug) == null ? $slug="#" : $slug = $request->slug;
        $page->update([
            'name' => $request->name,
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
        ]);

        return back()->with('success','Successfully Updated');
    }

    // delete
    public function destroy(Page $page)
    {
        unlink($page->pdf_document);
        $page->delete();

        return back()->withSuccess('Page Deleted Successfully');
    }

    // single page
    public function single_page($title){
        $page = Page::find($title);
        return view('front_end.single_page',[
            'page' => $page,
        ]);
    }

}
