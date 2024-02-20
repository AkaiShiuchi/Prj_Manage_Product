@extends('authentication.layouts')

@section('title', 'Login & Registration Form - W3hubs.com')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="username" name="name" id="name"
                                required>
                        </div>
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
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="confirm password"
                                name="confirm_password" id="confirm_password" required>
                        </div>
                        <div class="form-group">
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


    <script>
        $(document).ready(function() {
            $('#register_form').submit(function(e) {
                // Kiểm tra các trường input
                var name = $('#name').val();
                var email = $('#email').val();
                var password = $('#password').val();
                var confirm_password = $('#confirm_password').val();

                // Kiểm tra tên người dùng
                if (name == '') {
                    alert('Vui lòng nhập tên người dùng');
                    e.preventDefault();
                } else if (name.length < 6) {
                    alert('Tên người dùng phải có ít nhất 6 ký tự');
                    e.preventDefault();
                }

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
                    alert(
                        'Mật khẩu phải chứa ít nhất một chữ cái viết hoa, một chữ cái viết thường, một kí tự số và một kí tự đặc biệt, có ít nhất 6 ký tự'
                    );
                    e.preventDefault();
                }

                // Kiểm tra mật khẩu xác nhận
                if (confirm_password == '') {
                    alert('Vui lòng nhập mật khẩu xác nhận');
                    e.preventDefault();
                } else if (confirm_password !== password) {
                    alert('Mật khẩu xác nhận không khớp');
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
