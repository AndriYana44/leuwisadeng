<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Halaman;
use App\Models\Admin\Menu;
use App\Models\Admin\MenuParent;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    function index()
    {
        $data = MenuParent::all();
        $menu_link = Menu::with(['parent'])->get();
        return view('admin.menu.app', [
            'data' => $data,
            'menu_link' => $menu_link
        ]);
    }

    function create() 
    {
        $halaman = Halaman::all();
        $parent = MenuParent::all();
        return view('admin.menu.form-add', [
            'halaman' => $halaman,
            'parent' => $parent,
        ]);
    }

    function storeParent(Request $request)
    {
        $parent = new MenuParent();
        $parent->name = $request->menu;
        $parent->urutan = $request->urutan;
        $parent->save();

        return redirect('admin/menu')->with([
            'success' => 'Menu berhasil ditambahkan',
        ]);
    }

    function storeChild(Request $request)
    {
        $menu = new Menu();
        $menu->name = $request->menu;
        $menu->url = $request->url;
        $menu->id_parent = $request->parent;
        $menu->id_halaman = $request->halaman;
        $menu->is_child = 1;
        $menu->save();

        return redirect('admin/menu')->with([
            'success' => 'Menu berhasil ditambahkan',
        ]);
    }

    function storeSingle(Request $request)
    {
        $slug = explode(' ', $request->menu);
        $slug = implode('-', $slug);

        $menu = new MenuParent();
        $menu->name = $request->menu;
        $menu->urutan = $request->urutan;
        $menu->is_single = 1;
        $menu->url = $slug;
        $menu->id_halaman = $request->halaman;
        $menu->save();

        return redirect('admin/menu')->with([
            'success' => 'Menu berhasil ditambahkan',
        ]);
    }

    function edit($type, $id)
    {
        $type == 'child' ? $data = Menu::find($id) : $data = MenuParent::find($id);
        $halaman = Halaman::all();
        $parent = MenuParent::all();

        return view('admin.menu.form-edit', [
            'data' => $data,
            'parent' => $parent,
            'halaman' => $halaman,
            'type' => $type
        ]);
    }

    function update(Request $request, $type, $id)
    {
        $type == 'child' ? $data = Menu::find($id) : $data = MenuParent::find($id);
        $data->name = $request->menu;
        if($type == 'child' || $type == 'single') { $data->url = $request->url; }
        if($type == 'child') { $data->id_parent = $request->parent; }
        if($type == 'child' || $type == 'single') { $data->id_halaman = $request->halaman; }
        if($type == 'parent' || $type == 'single') { $data->urutan = $request->urutan; }
        $data->update();

        return redirect('admin/menu')->with([
            'success' => 'Data berhasil diubah',
        ]);
    }

    function destroy($type, $id)
    {
        if($type == 'parent') {
            MenuParent::find($id)->delete();
        }elseif($type == 'single') {
            Menu::find($id)->delete();
        }

        return redirect('admin/menu')->with([
            'success' => 'Menu berhasil dihapus',
        ]);
    }
}
