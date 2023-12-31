@extends('layouts.showroom')

@section('title', 'Detail ' . $vehicle->vehicle_type)

@section('content')
    <div>
        <h1>@yield('title')</h1>
    </div>

    <div class="card border-2 border-gray rounded-4">
        <div class="card-body">
            {{-- Memanggil field dari object yang dikirimkan Controller --}}
            <img src="{{ asset('storage/vehicles/' . $vehicle->image) }}" class="rounded w-100">
            <hr>
            <h4>{{ 'Model: ' . $vehicle->model }}</h4>
            <p>{{ 'Tahun: ' . $vehicle->year }}</p>
            <p>{{ 'Jumlah Penumpang: ' . $vehicle->passenger_count }}</p>
            <p>{{ 'Manufaktur: ' . $vehicle->manufacturer }}</p>
            <p>{{ 'Harga: Rp' . $vehicle->price }}</p>
            @if ($vehicle->vehicle_type == 'Mobil')
                <p>{{ 'Bahan Bakar: ' . $vehicle->fuel_type }}</p>
                <p>{{ 'Luas Bagasi: ' . $vehicle->trunk_space }}</p>
            @elseif ($vehicle->vehicle_type == 'Truck')
                <p>{{ 'Jumlah Roda Ban: ' . $vehicle->wheel_count }}</p>
                <p>{{ 'Luas Area Kargo: ' . $vehicle->cargo_area_size }}</p>
            @elseif ($vehicle->vehicle_type == 'Motor')
                <p>{{ 'Ukuran Bagasi: ' . $vehicle->trunk_size }}</p>
                <p>{{ 'Kapasitas Bensin: ' . $vehicle->fuel_capacity }}</p>
            @endif
            <p>{{ 'Dibuat: ' . $vehicle->created_at }}</p>
            <p>{{ 'Diubah: ' . $vehicle->updated_at }}</p>
        </div>
    </div>
@endsection
