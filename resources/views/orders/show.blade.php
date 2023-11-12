@extends('layouts.showroom')

@section('title', 'Detail Pesanan')

@section('content')
    <div>
        <h1>@yield('title')</h1>
    </div>

    <div class="card border-2 border-gray rounded-4">
        <div class="card-body">
            {{-- Memanggil field dari object yang dikirimkan Controller --}}
            <img src="{{ asset('storage/vehicles/' . $order->vehicle->image) }}" class="rounded w-100">
            <br>
            <br>
            <h4>{{ 'Model: ' . $order->vehicle->model }}</h4>
            <p>{{ 'Tahun: ' . $order->vehicle->year }}</p>
            <p>{{ 'Jumlah Penumpang: ' . $order->vehicle->passenger_count }}</p>
            <p>{{ 'Manufaktur: ' . $order->vehicle->manufacturer }}</p>
            <p>{{ 'Harga: Rp' . $order->vehicle->price }}</p>
            @if ($order->order_type == 'Mobil')
                <p>{{ 'Bahan Bakar: ' . $order->vehicle->fuel_type }}</p>
                <p>{{ 'Luas Bagasi: ' . $order->vehicle->trunk_space }}</p>
            @elseif ($order->order_type == 'Truck')
                <p>{{ 'Jumlah Roda Ban: ' . $order->vehicle->wheel_count }}</p>
                <p>{{ 'Luas Area Kargo: ' . $order->vehicle->cargo_area_size }}</p>
            @elseif ($order->order_type == 'Motor')
                <p>{{ 'Ukuran Bagasi: ' . $order->vehicle->trunk_size }}</p>
                <p>{{ 'Kapasitas Bensin: ' . $order->vehicle->fuel_capacity }}</p>
            @endif
            <hr>
            <span>Pesanan oleh
                <strong>{{ $order->customer->name }}</strong>
            </span>
            <br>
            <br>
            <p>{{ 'Alamat: ' . $order->customer->address }}</p>
            <p>{{ 'Nomor Telepon: ' . $order->customer->phone_number }}</p>
            <p>{{ 'ID Card: ' . $order->customer->id_card }}</p>
        </div>
    @endsection
