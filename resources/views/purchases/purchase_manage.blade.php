@extends('purchases.purchase_layout')

@section('title', 'Purchases Manage')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/purchase_manage.css') }}">
@endsection

@section('content')
    <div class="be-wrapper be-fixed-sidebar">
        <nav class="navbar navbar-expand fixed-top be-top-header">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="img nav-link" href="/home"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/home">DashBoard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/product-manage">Product Manage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/purchase-manage">Purchases Manage</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/register"><span class="fas fa-user"></span> Sign Up</a></li>
                    <li><a href="/"><span class="fas fa-sign-in-alt"></span> Login</a></li>
                    <li><a href="/logout"><span class="fas fa-sign-out-alt"></span> Logout</a></li>
                </ul>
            </div>
        </nav>
    </div>
@endsection
