<div style="width:600px; margin: 0 auto">
    <div style="text-align: center">
        <h2>Xin chào {{ $user->name }}</h2>
        <p>Bạn đã đăng ký tài khoản tại hệ thống của chúng tôi</p>
        <p>Vui lòng nhấn vào nút kích hoạt bên dưới để kích hoạt tài khoản</p>
        <p><a href="{{ route('actived', ['user' => $user->id, 'remember_token' => $user->remember_token]) }}"
                style="display:inline-block; background:green; color: #fff;padding:7px 25px;font-weight:bold">
                Kích hoạt
            </a>
        </p>
    </div>
</div>
