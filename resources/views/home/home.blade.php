@extends('home.layouts')

@section('title', 'Home')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="/home">MyShop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">DashBoard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/product-manage">Product Manage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Purchases Manage</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/register"><span class="fas fa-user"></span> Sign Up</a></li>
                <li><a href="/"><span class="fas fa-sign-in-alt"></span> Login</a></li>
                <li><a href="/logout"><span class="fas fa-sign-out-alt"></span> Logout</a></li>
            </ul>
        </div>
    </nav>
@endsection
