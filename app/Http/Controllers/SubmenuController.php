<?php

namespace App\Http\Controllers;

use App\Model\Page;
use App\Model\Submenu;
use App\Model\Menu;
use Illuminate\Http\Request;

class SubmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = Submenu::where('menu_id', $id)->latest()->first();
//        dd($data);
        $menu = Menu::find($id);
        $pages = Page::orderBy('created_at', 'desc')->get();
        $submenus = Submenu::orderBy('created_at', 'asc')->where('menu_id', $id)->paginate();


        return view('backend.menu.submenu.index', compact('menu', 'data', 'pages', 'submenus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $submenu = [];
        $type = $request->query('type');
        if($type == 'service'){
            $request->validate([
                'name' => 'required',
                'serial' => 'required',
                'slug' => 'required|unique:submenus'
            ]);
            $submenu['name'] = $request->name;
            $submenu['slug'] = str_replace(' ', '-', strtolower($request->slug));;
            $submenu['status'] = $request->status;
            $submenu['menu_id'] = $request->menu_id;
            $submenu['serial'] = $request->serial;
        }

//        dd();

        if($type == 'page'){
            $page = Page::find($request->page_id);
            $request->validate([
                'serial' => 'required',
                'page_id' => 'required',
            ]);


            $submenu['name'] = $page->name;
            $submenu['slug'] = $page->slug;
            $submenu['status'] = $request->status;
            $submenu['menu_id'] = $request->menu_id;
            $submenu['serial'] = $request->serial;
        }

//        str_slug($request->slug) == null ? $slug="#" : $slug = $request->slug;

        Submenu::create($submenu);

        return back()->withSuccess('Submenu Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function show(Submenu $submenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function edit(Submenu $submenu)
    {
        return view('backend.menu.submenu.edit', compact('submenu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Submenu $submenu)
    {
        $request->validate([
            'name' => 'required',
            'serial' => 'required',
            'slug' => 'required|unique:submenus,slug,'.$submenu->id,
        ]);
        $data = [];
        $data['name'] = $request->name;
        $data['slug'] = str_replace(' ', '-', strtolower($request->slug));
        $data['status'] = $request->status;
        $data['menu_id'] = $request->menu_id;
        $data['serial'] = $request->serial;

        $submenu->update($data);
        return back()->withSuccess('Submenu updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Submenu $submenu)
    {
        $submenu->delete();
        return back()->withSuccess('Submenu Deleted Successfully');
    }
}
