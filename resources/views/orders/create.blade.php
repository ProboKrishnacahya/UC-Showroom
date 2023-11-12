@extends('layouts.showroom')

@section('title', 'Tambah Pesanan')

@section('content')
    <div>
        <h1>@yield('title')</h1>
    </div>

    <div class="card border-2 border-gray rounded-4">
        <div class="card-body">
            <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="d-grid gap-3">
                    <div class="form-group d-grid">
                        <label for="customer_id" class="form-label">Pelanggan</label>
                        <select name="customer_id" id="customer_id" class="form-select">
                            <option value="" selected disabled>Pilih Pelanggan</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->customer_id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group d-grid">
                        <label for="vehicle_id" class="form-label">Kendaraan</label>
                        <select name="vehicle_id" id="vehicle_id" class="form-select">
                            <option value="" selected disabled>Pilih Kendaraan</option>
                            @foreach ($vehicles as $vehicle)
                                <option value="{{ $vehicle->vehicle_id }}">{{ $vehicle->vehicle_type }} - {{ $vehicle->model }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
