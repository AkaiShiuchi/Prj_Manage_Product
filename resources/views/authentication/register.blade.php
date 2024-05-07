@extends('authentication.layouts')

@section('title', 'Login & Registration Form - W3hubs.com')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <script src="{{ asset('js/register.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Sign Up</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-google-plus-square"></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('no'))
                        <div class="alert alert-danger">{{ session('no') }}</div>
                    @endif
                    <form id="register_form" action="/handle-register" method="POST">
                        @csrf
                        {{-- @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif --}}

                        <div class="input-group form-group mb-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="username" name="name" id="name"
                                required>
                        </div>
                        <span id="error-name" class="text-danger"></span>
                        @error('name')
                            <div class="text-danger">*{{ $message }}</div>
                        @enderror
                        <div class="input-group form-group mb-0 mt-3">
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
                        <div class="input-group form-group mb-0 mt-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="confirm password"
                                name="confirm_password" id="confirm_password" required>
                        </div>
                        <span id="error-confirm_password" class="text-danger"></span>
                        @error('confirm_password')
                            <div class="text-danger">*{{ $message }}</div>
                        @enderror
                        <div class="form-group mt-4">
                            <input type="submit" value="Sign Up" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Already have an account? <a href="/">Sign In</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
