@extends('layouts.showroom')

@section('title', 'Detail Pelanggan')

@section('content')
    <div>
        <h1>@yield('title')</h1>
    </div>

    <div class="card border-2 border-gray rounded-4">
        <div class="card-body">
            <h4>{{ $customer->name }}</h4>
            <hr>
            <p>{{ 'Alamat: ' . $customer->address }}</p>
            <p>{{ 'Nomor Telepon: ' . $customer->phone_number }}</p>
            <p>{{ 'ID Card: ' . $customer->id_card }}</p>
        </div>
    </div>
@endsection
