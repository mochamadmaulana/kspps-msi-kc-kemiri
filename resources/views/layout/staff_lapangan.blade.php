<!doctype html>
<html lang="en">

<head>
    <!-- Icon title bar -->
    <link rel="shortcut icon" href="{{ asset('frontend') }}/dist/img/logo-msi.png" type="image/png">

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title_dua ?? '' }} | {{ env('APP_NAME') ?? 'KSPPS MSI' }}</title>
    <!-- CSS files -->
    <link href="{{ asset('frontend') }}/dist/css/tabler.min.css" rel="stylesheet" />
    <link href="{{ asset('frontend') }}/dist/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="{{ asset('frontend') }}/dist/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="{{ asset('frontend') }}/dist/css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="{{ asset('frontend') }}/dist/css/demo.min.css" rel="stylesheet" />
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/dist/libs/select2/select2.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/dist/libs/select2/select2-bootstrap-5-theme.min.css" />
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/dist/libs/toastr/toastr.min.css" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
    @stack('css')
</head>

<body>
    <script src="{{ asset('frontend') }}/dist/js/demo-theme.min.js"></script>
    <div class="page">
        <!-- Navbar -->
        <header class="navbar navbar-expand-md d-print-none">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                    aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href="{{ route('admin.dashboard') }}">
                        <img src="{{ asset('frontend/dist/img/logo-msi.png') }}" width="110" height="32" alt="KSPPS MSI" class="navbar-brand-image">
                        {{ env('APP_NAME') ?? 'KSPPS MSI' }}
                    </a>
                </h1>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                            <span class="avatar avatar-sm" style="background-image: url({{ asset('frontend/dist/img/default.jpg') }})"></span>
                            <div class="d-none d-xl-block ps-2">
                                <div>{{ Auth::user()->nama_lengkap }}</div>
                                <div class="mt-1 small text-muted">{{ Auth::user()->role }}</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="./profile.html" class="dropdown-item">Profile</a>
                            {{-- <div class="dropdown-divider"></div> --}}
                            <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <header class="navbar-expand-md">
            <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="navbar">
                    <div class="container-xl">
                        <ul class="navbar-nav">
                            <li class="nav-item {{ Request::is('staff-lapangan/dashboard*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('staff-lapangan.dashboard') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block {{ Request::is('staff-lapangan/dashboard*') ? 'text-primary' : '' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Dashboard
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('staff-lapangan/anggota*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('staff-lapangan.anggota.index') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block {{ Request::is('staff-lapangan/anggota*') ? 'text-primary' : '' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Anggota
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('staff-lapangan/pembiayaan*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('staff-lapangan.pembiayaan.index') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block {{ Request::is('staff-lapangan/pembiayaan*') ? 'text-primary' : '' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-dollar" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" /><path d="M12 3v3m0 12v3" /></svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Pembiayaan
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item dropdown {{ Request::is('staff-lapangan/laporan*') ? 'active' : '' }}">
                                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block {{ Request::is('staff-lapangan/laporan*') ? 'text-primary' : '' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chart-pie" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 3.2a9 9 0 1 0 10.8 10.8a1 1 0 0 0 -1 -1h-6.8a2 2 0 0 1 -2 -2v-7a.9 .9 0 0 0 -1 -.8" /><path d="M15 3.5a9 9 0 0 1 5.5 5.5h-4.5a1 1 0 0 1 -1 -1v-4.5" /></svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Laporan
                                    </span>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="dropdown-menu-columns">
                                        <div class="dropdown-menu-column">
                                            <a href="{{ route('staff-lapangan.laporan.pengajuan-pembiayaan.index') }}" class="dropdown-item {{ Request::is('staff-lapangan/laporan/pengajuan-pembiayaan*') ? 'active' : '' }}">
                                                Pengajuan Pembiayaan
                                            </a>
                                            <a href="{{ route('staff-lapangan.laporan.penyaluran-pembiayaan.index') }}" class="dropdown-item {{ Request::is('staff-lapangan/laporan/penyaluran-pembiayaan*') ? 'active' : '' }}">
                                                Penyaluran Pembiayaan
                                            </a>
                                            <a href="{{ route('staff-lapangan.laporan.pengajuan-anggota.index') }}" class="dropdown-item {{ Request::is('staff-lapangan/laporan/pengajuan-anggota*') ? 'active' : '' }}">
                                                Pengajuan Anggota
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" /><path d="M9 12h12l-3 -3" /><path d="M18 15l3 -3" /></svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Logout
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle">
                                {{ $title_satu ?? '' }}
                            </div>
                            <h2 class="page-title">
                                {{ $title_dua ?? '' }}
                            </h2>
                        </div>
                        <!-- Button Page header -->
                        @stack('btn-page-header')
                    </div>
                </div>
            </div>
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    @yield('page-body')
                </div>
            </div>

            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-lg-auto ms-lg-auto">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Version 0.1
                                    {{-- <a href="https://www.instagram.com/moch.maulll/" target="_blank" class="link-secondary" rel="noopener">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" /><path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M16.5 7.5l0 .01" /></svg>
                                        moch.maulll
                                    </a> --}}
                                </li>
                                {{-- <li class="list-inline-item">
                                    <a href="https://github.com/mochamadmaulana/" target="_blank" class="link-secondary" rel="noopener">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-github" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" /></svg>
                                        mochamadmaulana
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright &copy; 2023 <?= date('Y') != '2023' ? ' - '. date('Y') : null ?>
                                    <a href="https://kopsyahmsi.com/mainweb/" target="_blank" class="link-primary fst-italic">PT. Mitra Sejahtera Raya Indonesia</a>.
                                    All rights reserved.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @stack('modal')
    <script src="{{ asset('frontend') }}/dist/libs/select2/jquery-3.7.1.min.js"></script>
    <!-- Select2 -->
    <script src="{{ asset('frontend') }}/dist/libs/select2/select2.min.js"></script>
    <!-- Toastr -->
    <script src="{{ asset('frontend') }}/dist/libs/toastr/toastr.min.js"></script>
    <script src="{{ asset('frontend') }}/dist/libs/toastr/config.js"></script>

    <!-- Tabler Core -->
    <script src="{{ asset('frontend') }}/dist/js/tabler.min.js" defer></script>
    <script src="{{ asset('frontend') }}/dist/js/demo.min.js" defer></script>
    @if (session('success'))
    <script>
    toastr.success("{{ session('success') }}");
    </script>
    @endif
    @if (session('error'))
    <script>
    toastr.error("{{ session('error') }}");
    </script>
    @endif
    @stack('js')
</body>

</html>
