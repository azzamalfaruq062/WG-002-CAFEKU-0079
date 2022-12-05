@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <h3>Data User</h3>
        {{-- tombol tambah data, dengan memanggil route user create --}}
        <a class="btn btn-success btn-sm mt-2" href="{{route('user.create')}}">Tambah data +</a>
        <table class="table table-hover mt-2">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            @foreach ($data as $u)                
            <tr>
                {{-- membuat no --}}
                <td>{{$loop->iteration}}</td>
                {{-- menampilkan data nama dari user --}}
                <td>{{$u->name}}</td>
                {{-- menampilkan data role dari user --}}
                <td>{{$u->role}}</td>
                <td>
                    {{-- tombol edit, melemparkan id sesuai data pada tabel --}}
                    <a class="btn btn-primary btn-sm" href="{{route('user.edit', $u->id)}}">Edit</a>
                    {{-- tombol hapus, melemparkan id sesuai data pada tabel --}}
                    <a class="btn btn-danger btn-sm" href="{{route('deletuser', $u->id)}}">Hapus</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection