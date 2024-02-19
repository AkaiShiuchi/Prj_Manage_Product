@extends('authentication.layouts')

@section('title', 'Login & Registration Form - W3hubs.com')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Lấy lại mật khẩu</h3>
                    <p style="color: white">Vui lòng nhập email mà bạn đã đăng ký tài khoản</p>
                </div>
                <div class="card-body">
                    <form action="/handle-forget" method="POST">
                        @csrf

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="email" name="email" required>
                        </div>
                        @error('email')
                            <small class="help-block" style="color: red">{{ $message }}</small>
                        @enderror
                        <div class="form-group">
                            <input type="submit" value="Gửi email" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
