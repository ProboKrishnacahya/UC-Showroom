@extends('layouts.showroom')

@section('title', 'Tambah Pelanggan')

@section('content')
    <div>
        <h1>@yield('title')</h1>
    </div>

    <div class="card border-2 border-gray rounded-4">
        <div class="card-body">
            <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="d-grid gap-3">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            placeholder="Masukkan Nama">
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="address" id="address" rows="5" class="form-control" placeholder="Masukkan Alamat"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="number" min="0"
                            class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                            placeholder="Masukkan Nomor Telepon">
                    </div>

                    <div class="form-group">
                        <label>ID Card</label>
                        <input type="number" min="0" class="form-control @error('id_card') is-invalid @enderror"
                            name="id_card" placeholder="Masukkan ID Card">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
