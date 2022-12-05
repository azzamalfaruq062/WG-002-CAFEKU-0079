@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <h3>Data Menu</h3>
        <a class="btn btn-success btn-sm mt-2" href="{{route('menu.create')}}">Tambah data +</a>
        <table class="table table-hover mt-2">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Foto</th>
                <th>Harga</th>
                <th>Keterangan</th>
                <th>Kategori</th>
                <th>Action</th>
            </tr>
            @foreach ($data as $m)                
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$m->name}}</td>
                <td><img src="{{asset('storage/').'/'.$m->foto}}"></td>
                <td>{{$m->harga}}</td>
                <td>{{$m->kategoris->name}}</td>
                <td>{{$m->keterangan}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{route('menu.edit', $m->id)}}">Edit</a>
                    <a class="btn btn-danger btn-sm" href="{{route('deletmenu', $m->id)}}">Hapus</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection