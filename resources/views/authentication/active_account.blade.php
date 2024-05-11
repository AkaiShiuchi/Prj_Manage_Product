@extends('authentication.layouts')
@section('style')
    {{-- <script src="{{ asset('js/authentication/actived.js') }}"></script> --}}
@endsection
@section('content')
    <div style="width:600px; margin: 0 auto">
        <div style="text-align: center">
            <h2>Xin chào {{ $user->name }}</h2>
            <p>Bạn đã đăng ký tài khoản tại hệ thống của chúng tôi</p>
            <p>Vui lòng nhấn vào nút kích hoạt bên dưới để kích hoạt tài khoản</p>
            <form action="{{ route('actived', ['id' => $user->id]) }}" method="GET" target="_blank" id="activateForm">
                @csrf
                {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                <p>
                    <button type="submit" id="actived_account"
                        style="display:inline-block; background:green; color: #fff;padding:7px 25px;font-weight:bold">
                        Kích hoạt
                    </button>
                </p>
            </form>
        </div>
    </div>
@endsection
