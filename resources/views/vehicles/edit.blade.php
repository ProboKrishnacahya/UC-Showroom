@extends('layouts.showroom')

@section('title', 'Ubah Kendaraan')

@section('content')
    <div>
        <h1>@yield('title')</h1>
    </div>

    <div class="card border-2 border-gray rounded-4">
        <div class="card-body">
            <form action="{{ route('vehicles.update', $vehicle->vehicle_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="d-grid gap-3">
                    <div class="form-group d-grid">
                        <label>Jenis Kendaraan</label>
                        <select name="vehicle_type" id="vehicle_type" class="form-select">
                            <option value="" selected disabled>Pilih Jenis Kendaraan</option>
                            <option value="Mobil">Mobil</option>
                            <option value="Motor">Motor</option>
                            <option value="Truck">Truck</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Foto Kendaraan</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                    </div>

                    <div class="form-group">
                        <label>Model</label>
                        <input type="text" class="form-control @error('model') is-invalid @enderror" name="model"
                            value="{{ old('model', $vehicle->model) }}" placeholder="Masukkan Model">
                    </div>

                    <div class="form-group">
                        <label>Tahun</label>
                        <input type="number" min="0" class="form-control @error('year') is-invalid @enderror"
                            name="year" value="{{ old('year', $vehicle->year) }}" placeholder="Masukkan Tahun">
                    </div>

                    <div class="form-group">
                        <label>Jumlah Penumpang</label>
                        <input type="number" min="0"
                            class="form-control @error('passenger_count') is-invalid @enderror" name="passenger_count"
                            value="{{ old('passenger_count', $vehicle->passenger_count) }}"
                            placeholder="Masukkan Jumlah Penumpang">
                    </div>

                    <div class="form-group">
                        <label>Manufaktur</label>
                        <input type="text" class="form-control @error('manufacturer') is-invalid @enderror"
                            name="manufacturer" value="{{ old('manufacturer', $vehicle->manufacturer) }}"
                            placeholder="Masukkan Manufaktur">
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" min="0" class="form-control @error('price') is-invalid @enderror"
                            name="price" value="{{ old('price', $vehicle->price) }}" placeholder="Masukkan Harga">
                    </div>

                    <div id="mobil" class="d-none d-grid gap-3">
                        <div class="form-group d-grid">
                            <label>Bahan Bakar</label>
                            <select name="fuel_type" id="fuel_type" class="form-select">
                                <option value="Bensin">Bensin</option>
                                <option value="Solar">Solar</option>
                                <option value="CNG">CNG</option>
                                <option value="Listrik">Listrik</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Luas Bagasi</label>
                            <input type="number" min="1"
                                class="form-control @error('trunk_space') is-invalid @enderror" name="trunk_space"
                                value="{{ old('trunk_space', $vehicle->trunk_space) }}" placeholder="Masukkan Luas Bagasi">
                        </div>
                    </div>

                    <div id="truck" class="d-none d-grid gap-3">
                        <div class="form-group">
                            <label>Jumlah Roda Ban</label>
                            <input type="number" min="1"
                                class="form-control @error('wheel_count') is-invalid @enderror" name="wheel_count"
                                value="{{ old('wheel_count', $vehicle->wheel_count) }}"
                                placeholder="Masukkan Jumlah Roda Ban">
                        </div>

                        <div class="form-group">
                            <label>Luas Area Kargo</label>
                            <input type="number" min="1"
                                class="form-control @error('cargo_area_size') is-invalid @enderror" name="cargo_area_size"
                                value="{{ old('cargo_area_size', $vehicle->cargo_area_size) }}"
                                placeholder="Masukkan Luas Bagasi">
                        </div>
                    </div>

                    <div id="motor" class="d-none d-grid gap-3">
                        <div class="form-group">
                            <label>Ukuran Bagasi</label>
                            <input type="number" min="1"
                                class="form-control @error('trunk_size') is-invalid @enderror" name="trunk_size"
                                value="{{ old('trunk_size', $vehicle->trunk_size) }}" placeholder="Masukkan Ukuran Bagasi">
                        </div>

                        <div class="form-group">
                            <label>Kapasitas Bensin</label>
                            <input type="number" min="1"
                                class="form-control @error('fuel_capacity') is-invalid @enderror" name="fuel_capacity"
                                value="{{ old('fuel_capacity', $vehicle->fuel_capacity) }}"
                                placeholder="Masukkan Kapasitas Bensin">
                        </div>
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
