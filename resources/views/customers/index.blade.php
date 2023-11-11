@extends('layouts.showroom')

@section('title', 'Pelanggan')

@section('content')
    <div>
        <h1>@yield('title')</h1>
    </div>

    <div class="card border-2 border-gray rounded-4">
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <a href="{{ route('customers.create') }}" class="btn btn-success mb-3">Tambah Pelanggan</a>
            </div>

                <table
                    class="table table-responsive table-light table-striped table-borderless table-hover rounded overflow-hidden">
                    <thead>
                        <tr>
                            <th scope="col" class="bg-dark text-white">Nama</th>
                            <th scope="col" class="bg-dark text-white">Alamat</th>
                            <th scope="col" class="bg-dark text-white">Nomor Telepon</th>
                            <th scope="col" class="bg-dark text-white">ID Card</th>
                            <th scope="col" class="bg-dark text-white">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($customers as $customer)
                        <tr>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->phone_number }}</td>
                            <td>{{ $customer->id_card }}</td>
                            <td>
                                <form onsubmit="return confirm('Yakin ingin hapus?');"
                                    action="{{ route('customers.destroy', $customer->customer_id) }}" method="POST">
                                    <a href="{{ route('customers.show', $customer->customer_id) }}" class="btn btn-info">Lihat</a>
                                    <a href="{{ route('customers.edit', $customer->customer_id) }}" class="btn btn-warning">Ubah</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <div class="alert alert-secondary text-center">Data Pelanggan belum tersedia</div>
                        @endforelse
                    </tbody>
                </table>

            {{-- Menampilkan pagination --}}
            <div class="d-flex justify-content-center">
                {{ $customers->links() }}
            </div>
        </div>
    </div>
@endsection
