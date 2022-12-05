@extends('layouts.app')

@section('content')
<div class="container">
   <div>
        <form class="col-6" action="{{route('user.update', $data->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <label>Role :</label>
                <select class="form-control" name="role">
                    {{-- str ucffirst untuk merubah huruf depan menjadi besar --}}
                    <option value="{{$data->role}}" selected>{{Str::ucfirst($data->role)}}</option>
                    <option value="owner">Owner</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <input class="btn btn-success btn-sm" type="submit" value="submit">
        </form>
   </div>
</div>
@endsection