@extends('layouts.showroom')

@section('title', 'Ubah Pesanan')

@section('content')
    <div>
        <h1>@yield('title')</h1>
    </div>

    <div class="card border-2 border-gray rounded-4">
        <div class="card-body">
            <form action="{{ route('orders.update', $order->order_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="d-grid gap-3">
                    <div class="form-group d-grid">
                        <label for="customer_id" class="form-label">Customer</label>
                        <select name="customer_id" id="customer_id" class="form-select">
                            <option value="" selected disabled>Select Customer</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->customer_id }}"
                                    {{ $customer->customer_id == $order->customer_id ? 'selected' : '' }}>
                                    {{ $customer->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group d-grid">
                        <label for="vehicle_id" class="form-label">Vehicle</label>
                        <select name="vehicle_id" id="vehicle_id" class="form-select">
                            <option value="" selected disabled>Select Vehicle</option>
                            @foreach ($vehicles as $vehicle)
                                <option value="{{ $vehicle->vehicle_id }}"
                                    {{ $vehicle->vehicle_id == $order->vehicle_id ? 'selected' : '' }}>
                                    {{ $vehicle->vehicle_type }} - {{ $vehicle->model }} - {{ $vehicle->price }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var vehicleType = $('#vehicle_type');
            var mobil = $('#mobil');
            var truck = $('#truck');
            var motor = $('#motor');

            vehicleType.change(function() {
                // Hide all additional fields initially
                mobil.addClass('d-none');
                truck.addClass('d-none');
                motor.addClass('d-none');

                // Show additional fields based on the selected vehicle type
                if (vehicleType.val() === 'Mobil') {
                    mobil.removeClass('d-none');
                } else if (vehicleType.val() === 'Truck') {
                    truck.removeClass('d-none');
                } else if (vehicleType.val() === 'Motor') {
                    motor.removeClass('d-none');
                }
            });
        });
    </script>
@endsection
