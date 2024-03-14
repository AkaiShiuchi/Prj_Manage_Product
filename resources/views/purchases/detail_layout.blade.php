<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- <link rel="stylesheet" href="{{ asset('css/detail_layout/boxicons.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/detail_layout/demo.css') }}"> --}}

    {{-- <link rel="stylesheet" href="{{ asset('css/detail_layout/perfect-scrollbar.css') }}"> --}}

    {{-- <script src="{{ asset('js/detail_layout/helpers.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/detail_layout/app-ecommerce-order-details.js') }}"></script> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/detail_layout/core.css') }}"
        class="template-customizer-core-css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/detail_layout/theme-default.css') }}"
        class="template-customizer-theme-css">
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <!-- Tải Bootstrap JavaScript từ CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <title>@yield('title')</title>
    @yield('style')
</head>

<body>
    @yield('content')
</body>

</html>
