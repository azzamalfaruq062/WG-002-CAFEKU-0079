@extends('layouts.app')

@section('content')
<div class="container">
   <div>
        <form class="col-6" action="{{route('menu.update', $menu->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <label>Nama Menu :</label>
                <input class="form-control" type="text" name="name" value="{{$menu->name}}">
            </div>
            <div class="mb-2">
                <label>Foto :</label>
                <input class="form-control" type="file" name="foto" >
            </div>
            <div class="mb-2">
                <label>Harga Menu :</label>
                <input class="form-control" type="number" name="harga" value="{{$menu->harga}}">
            </div>
            <div class="mb-2">
                <label>Kategori :</label>
                <select class="form-control" name="kategoris_id">
                        <option value="{{$menu->kategoris_id}}">{{$menu->kategoris->name}}</option>
                    @foreach($kategori as $k)
                        <option value="{{$k->id}}">{{$k->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-2">
                <label>Keterangan :</label>
                <textarea class="form-control" name="keterangan">{{$menu->keterangan}}</textarea>
            </div>
            <input class="btn btn-success btn-sm" type="submit" value="submit">
        </form>
   </div>
</div>
@endsection