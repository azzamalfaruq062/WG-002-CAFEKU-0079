@extends('layouts.app')

@section('content')
<div class="container">
   <div>
        <form class="col-6" action="{{route('kategori.update', $kategori->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <label>Kategori :</label>
                <input class="form-control" type="text" name="name" value="{{$kategori->name}}">
            </div>
            <input class="btn btn-success btn-sm" type="submit" value="submit">
        </form>
   </div>
</div>
@endsection