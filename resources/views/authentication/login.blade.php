@extends('authentication.layouts')

@section('title', 'Login & Registration Form - W3hubs.com')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="{{ asset('js/login.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        {{-- @if (session('mess'))
            <div class="alert alert-info"><small>{!! html_entity_decode(session('mess')) !!}</small></div>
        @endif
        @if (session('message'))
            <div class="alert alert-info"><small>{{ session('message') }}</small></div>
        @endif --}}
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Sign In</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-google-plus-square"></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                    </div>
                </div>
                <div class="card-body">
                    <form id="login_form" action="/handle-login" method="POST">
                        @csrf

                        <div class="input-group form-group mb-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="email" name="email" id="email"
                                required>
                        </div>
                        <span id="error-email" class="text-danger"></span>
                        @error('email')
                            <div class="text-danger">*{{ $message }}</div>
                        @enderror
                        <div class="input-group form-group mb-0 mt-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="password" name="password"
                                id="password" required>
                        </div>
                        <span id="error-password" class="text-danger"></span>
                        @error('password')
                            <div class="text-danger">*{{ $message }}</div>
                        @enderror
                        <div class="row align-items-center remember mt-4">
                            <input type="checkbox">Remember Me
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Don't have an account?<a href="/register">Sign Up</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('forget_password') }}">Forgot your password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
