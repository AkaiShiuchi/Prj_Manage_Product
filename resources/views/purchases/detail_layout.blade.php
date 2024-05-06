<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="{{ asset('css/detail_layout/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail_layout/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/detail_layout/core.css') }}"
        class="template-customizer-core-css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/detail_layout/theme-default.css') }}"
        class="template-customizer-theme-css">
    <link rel="stylesheet" href="{{ asset('css/detail_layout/databases.checkboxes.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('js/detail_layout/jquery.js') }}"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}

    <script src="{{ asset('js/detail_layout/popper.js') }}"></script>
    <script src="{{ asset('js/detail_layout/bootstrap.js') }}"></script>
    <script src="{{ asset('js/detail_layout/bootstrap5.js') }}"></script>

    <title>@yield('title')</title>
    @yield('style')
</head>

<body>
    @yield('content')
</body>

</html>
