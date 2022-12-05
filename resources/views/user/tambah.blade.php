@extends('layouts.app')

@section('content')
<div class="container">
   <div>
        <form class="col-6" action="{{route('user.store')}}" method="POST">
            @csrf
            <div class="mb-2">
                <label>Nama :</label>
                <input class="form-control" type="text" name="name" >
            </div>
            <div class="mb-2">
                <label>Email :</label>
                <input class="form-control" type="email" name="email" >
            </div>
            <div class="mb-2">
                <label>Password :</label>
                <input class="form-control" type="password" name="password" >
            </div>
            <div class="mb-2">
                <label>Role :</label>
                <select class="form-control" name="role">
                    <option value="owner">Owner</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <input class="btn btn-success btn-sm" type="submit" value="submit">
        </form>
   </div>
</div>
@endsection