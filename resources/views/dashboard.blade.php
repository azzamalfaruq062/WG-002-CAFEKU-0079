@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Order') }}</div>
                <form class="p-2" action="{{route('hitung')}}" method="POST">
                    @csrf
                    <div>
                        <label>Nama :</label>
                        <input class="form-control" type="text" name="name">
                    </div>
                    <div>
                        <label>Pesanan :</label>
                        <input class="form-control" type="text" name="pesanan">
                    </div>
                    <div>
                        <label>Total Pesanan :</label>
                        <input class="form-control" type="number" name="total">
                    </div>
                    <input class="btn btn-sm btn-success mt-2" type="submit" value="submit">
                </form>

                <table class="table-responsive m-2">
                    @isset($data)                        
                    <tr>
                        <th>Nama</th>
                        <th>Jumlah Pesanan</th>
                        <th>Total Pesanan</th>
                        <th>Status</th>
                        <th>Diskon</th>
                        <th>Total Pembayaran</th>
                    </tr>
                    <tr>
                        <td>{{$data['nama']}}</td>
                        <td>{{$data['jumlah']}}Pcs</td>
                        <td>{{$data['total']}}</td>
                        <td>{{$data['status']}}</td>
                        <td>
                            {{$data['diskon']}}
                        </td>
                        <td>{{$data['totalPembayaran']}}</td>
                    </tr>
                    @endisset
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
