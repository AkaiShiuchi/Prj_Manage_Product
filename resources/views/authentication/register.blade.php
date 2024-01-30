@extends('authentication.layouts')

@section('title', 'Login & Registration Form - W3hubs.com')

@section('style')
<link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection

@section('content')
<div class="container">
    <h1>Registration Form</h1>
    <div class="row">
        <div class="col-md-6">
            <div id="sign">
                <form action="/handle-register" method="POST">
                    <h2>Registration</h2>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Username" required>
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" required>
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Confirm Password" required>
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email" required>
                    </div>

                    <button type="submit" class="btn btn-dark">Registration</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection