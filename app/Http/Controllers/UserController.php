<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//fungsi untuk menampilkan data user dalam tabel
    {
        $data = User::all();//menampung data user dari database
        return view('user.tampil', compact('data'));//melempar data yg suda di tampung kedalam view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.tambah');//melempar ke tampilan edit user
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = User::create([//menambah data user
            'name' => $request->name,//data di ambil dari form dengan request
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect('user');//mengembalikan kehalaman data user setelah tambah data user
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);//menampung data user sesuai id pada tombol edit
        return view('user.edit', compact('data'));//melempar data ke view edit user
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = User::find($id);//menampung data user sesuai id
            $data->update([//mengupdate data dengan menggunakan update method
                'role' => $request->role,
                'status' => $request->status,
            ]);

        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);//menampung/mencari data sesuai id pada tombol delet
        $data->delete();//delet dengan method delete()

        return redirect('user');//mengembalikan ke user
    }
}
