@extends('authentication.layouts')

@section('title', 'Login & Registration Form - W3hubs.com')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
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
                    <form action="/handle-get/{{ $user->id }}/{{ $token }}" method="POST">
                        @csrf
                        @if (session('err'))
                            <div class="alert alert-danger">{{ session('err') }}</div>
                        @endif

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="password" name="password" required>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="confirm password"
                                name="confirm_password" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Xác nhận" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
