<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- HTML --}}
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Showroom, Micro Credentials, Sertifikasi" />
    <meta name="description" content="Micro Credentials - Sertifikasi UC 2023: UC Showroom." />
    <meta name="owner" content="Probo Krishnacahya" />
    <meta name="theme-color" content="#0d6efd">

    {{-- Laravel CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    {{-- jQuery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" type="text/css" />

    {{-- Tab Page Title --}}
    <title>@yield('title')</title>
</head>

<body>
    {{-- Web's Header --}}
    <nav class="navbar navbar-dark navbar-expand-lg bg-primary bg-gradient">
        <div class="container-fluid">
            <strong>
                <a class="navbar-brand" href="{{ url('/') }}">UC Showroom</a>
            </strong>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link {{ $active_vehicles ?? '' }}" aria-current="page"
                        href={{ url('/vehicles') }}>Kendaraan</a>
                    <a class="nav-link {{ $active_customers ?? '' }}" href={{ url('/customers') }}>Pelanggan</a>
                    <a class="nav-link {{ $active_orders ?? '' }}" href={{ url('/orders') }}>Pesanan</a>
                </div>
            </div>
        </div>
    </nav>

    {{-- Web's Content --}}
    <main>
        <div class="container my-5">
            @yield('content')
        </div>
    </main>
</body>

</html>
