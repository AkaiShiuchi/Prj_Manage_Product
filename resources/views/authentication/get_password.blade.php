@extends('authentication.layouts')

@section('title', 'Login & Registration Form - W3hubs.com')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="{{ asset('js/authentication/reset_password.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Đặt lại mật khẩu</h3>
                    <div></div>
                </div>
                <div class="card-body">
                    <form action="/handle-get/{{ $user->id }}/{{ $remember_token }}" method="POST" id="reset_password">
                        @csrf
                        @if (session('err'))
                            <div class="alert alert-danger">{{ session('err') }}</div>
                        @endif

                        <div class="input-group form-group mb-0">
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
                            <input type="submit" value="Xác nhận" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
