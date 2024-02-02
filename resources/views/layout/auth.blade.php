<!doctype html>
<html lang="en">
    <head>
        <!-- Icon title bar -->
        <link rel="shortcut icon" href="{{ asset('frontend') }}/dist/img/logo-msi.png" type="image/png">

        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <title>{{ $title ?? '' }} | {{ env('APP_NAME') ?? 'KSPPS MSI' }}</title>
        <!-- CSS files -->
        <link href="{{ asset('frontend') }}/dist/css/tabler.min.css" rel="stylesheet"/>
        <link href="{{ asset('frontend') }}/dist/css/tabler-flags.min.css" rel="stylesheet"/>
        <link href="{{ asset('frontend') }}/dist/css/tabler-payments.min.css" rel="stylesheet"/>
        <link href="{{ asset('frontend') }}/dist/css/tabler-vendors.min.css" rel="stylesheet"/>
        <link href="{{ asset('frontend') }}/dist/css/demo.min.css" rel="stylesheet"/>
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
    </head>
    <body  class=" d-flex flex-column">
        <script src="{{ asset('frontend') }}/dist/js/demo-theme.min.js"></script>
        <div class="page page-center">
            <div class="container container-tight py-4">
                <div class="text-center mb-4">
                    <a href="{{ route('login') }}" class="navbar-brand navbar-brand-autodark"><img src="{{ asset('frontend/dist/img/logo-msi.png') }}" height="150" alt="KSPPS MSI"></a>
                </div>
                @yield('page-body')
            </div>
        </div>
        <script src="{{ asset('frontend') }}/dist/libs/select2/jquery-3.7.1.min.js"></script>
        <!-- Tabler Core -->
        <script src="{{ asset('frontend') }}/dist/js/tabler.min.js" defer></script>
        <script src="{{ asset('frontend') }}/dist/js/demo.min.js" defer></script>
        <!-- Toastr -->
        <script src="{{ asset('frontend') }}/dist/libs/toastr/toastr.min.js"></script>
        <script src="{{ asset('frontend') }}/dist/libs/toastr/config.js"></script>
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
    </body>
</html>
