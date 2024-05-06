<div style="width:600px; margin: 0 auto">
    <div style="text-align: center">
        <h2>Xin chào {{ $user->name }}</h2>
        <p>Email này để giúp bạn lấy lại mật khẩu</p>
        <p>Vui lòng kích vào link bên dưới để đặt lại mật khẩu</p>
        <p>Chú ý: Mã xác nhận trong link chỉ có hiệu lực trong vòng 72 giờ</p>
        <p><a href="{{ route('get_password', ['user' => $user->id, 'remember_token' => $user->remember_token]) }}"
                style="display:inline-block; background:green; color: #fff;padding:7px 25px;font-weight:bold">
                Đặt lại mật khẩu
            </a>
        </p>
    </div>
</div>
