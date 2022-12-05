<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
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
        $data = Menu::all();
        return view('menu.tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('menu.tambah', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Menu::create([
            'name' => $request->name,
            'harga' => $request->harga,
            'kategoris_id' => $request->kategoris_id,
            'keterangan' => $request->keterangan,
            'foto' => $request->file('foto')->store('public/artikel/foto'),//menyimpan file image kedalam folder public/artikel/foto
        ]);
        return redirect('menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $kategori = Kategori::all();
        return view('menu.edit', compact('menu', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        if($request->file('foto')){//mengetes apabila file foto diubah maka update image baru apabila tidak diubah maka isi dg foto yg lama
            $menu->name = $request->name;
            $menu->kategoris_id = $request->kategoris_id;
            $menu->harga = $request->harga;
            $menu->keterangan = $request->keterangan;
            $menu->foto = $request->file('foto')->store('public/artikel/foto');
            $menu->save();
        }else{
            $menu->name = $request->name;
            $menu->kategoris_id = $request->kategoris_id;
            $menu->harga = $request->harga;
            $menu->keterangan = $request->keterangan;
            $menu->foto = $menu->foto;
            $menu->save();
        }
        return redirect('menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect('menu');
    }
    // Fungsi/method menampilkan semua menu di halaman awal
    public function depan()
    {
        $menu = Menu::all();
        return view('welcome', compact('menu'));
    }
}
