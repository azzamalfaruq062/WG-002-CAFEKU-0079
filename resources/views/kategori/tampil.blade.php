@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <h3>Data Kategori</h3>
        <a class="btn btn-success btn-sm mt-2" href="{{route('kategori.create')}}">Tambah data +</a>
        <table class="table table-hover mt-2">
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Action</th>
            </tr>
            @foreach ($data as $k)                
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$k->name}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{route('kategori.edit', $k->id)}}">Edit</a>
                    <a class="btn btn-danger btn-sm" href="{{route('deletkategori', $k->id)}}">Hapus</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection