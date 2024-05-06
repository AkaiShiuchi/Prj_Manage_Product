<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="{{ asset('css/purchase_manage/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/purchase_manage/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/purchase_manage/typeahead.css') }}">

    <link rel="stylesheet" href="{{ asset('css/detail_layout/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail_layout/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('css/purchase_manage/buttons.bootstrap5.css') }}">
    <script src="{{ asset('js/purchase_manage/helpers.js') }}"></script>

    <script src="{{ asset('js/purchase_manage/config.js') }}"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/detail_layout/core.css') }}"
        class="template-customizer-core-css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/detail_layout/theme-default.css') }}"
        class="template-customizer-theme-css">
    <link rel="stylesheet" href="{{ asset('css/detail_layout/databases.checkboxes.css') }}">
    <link rel="stylesheet" href="{{ asset('css/purchase_manage/api.min.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins%3Aital%2Cwght%400%2C400%3B0%2C500%3B0%2C700&amp;display=swap">

    <script src="{{ asset('js/detail_layout/jquery.js') }}"></script>

    <script src="{{ asset('js/detail_layout/popper.js') }}"></script>
    <script src="{{ asset('js/detail_layout/bootstrap.js') }}"></script>
    <script src="{{ asset('js/purchase_manage/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('js/detail_layout/bootstrap5.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @yield('style')
</head>

<body>
    @yield('content')
</body>

</html>
