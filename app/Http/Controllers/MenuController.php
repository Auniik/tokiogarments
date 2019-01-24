<?php

namespace App\Http\Controllers;

use App\Model\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::paginate();
        return view('backend.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Menu::latest()->first();
        return view('backend.menu.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required',
           'slug' => 'required',
           'serial' => 'required',
        ]);
        str_slug($request->slug) == null ? $slug="#" : $slug = $request->slug;
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->slug = $slug;
        $menu->serial = $request->serial;
        $menu->save();
        return back()->withSuccess('Menu added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('backend.menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
           'name' => 'required',
           'slug' => 'required',
           'serial' => 'required',
        ]);
        str_slug($request->slug) == null ? $slug="#" : $slug = $request->slug;
        $menu->update([
            'name' => $request->name,
            'slug' => $slug,
            'serial' => $request->serial,
        ]);
        return back()->withSuccess('Menu updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return back()->withSuccess('Menu deleted successfully');
    }
}
