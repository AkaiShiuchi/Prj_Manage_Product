@extends('authentication.layouts')

@section('title', 'Login & Registration Form - W3hubs.com')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <div class="container">
        @if (session('mess'))
            <div class="alert alert-info"><small>{!! html_entity_decode(session('mess')) !!}</small></div>
        @endif
        @if (session('message'))
            <div class="alert alert-info"><small>{{ session('message') }}</small></div>
        @endif
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
                        @if (session('err'))
                            <div class="alert alert-danger"><small>{{ session('err') }}</small></div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="email" name="email" id="email"
                                required>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="password" name="password"
                                id="password" required>
                        </div>
                        <div class="row align-items-center remember">
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


    <script>
        $(document).ready(function() {
            $('#login_form').submit(function(e) {
                // Kiểm tra các trường input
                var email = $('#email').val();
                var password = $('#password').val();

                // Kiểm tra email
                if (email == '') {
                    alert('Vui lòng nhập địa chỉ email');
                    e.preventDefault();
                } else if (!validateEmail(email)) {
                    alert('Vui lòng nhập đúng địa chỉ email');
                    e.preventDefault();
                }

                // Kiểm tra mật khẩu
                if (password == '') {
                    alert('Vui lòng nhập mật khẩu');
                    e.preventDefault();
                } else if (!validatePassword(password)) {
                    alert('Mật khẩu không chính xác');
                    e.preventDefault();
                }
            });

            // Hàm validate email
            function validateEmail(email) {
                var re = /\S+@\S+\.\S+/;
                return re.test(email);
            }

            //Hàm validate password
            function validatePassword(password) {
                var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;
                return regex.test(password);
            }
        });
    </script>
@endsection
