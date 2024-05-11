$(document).ready(function() {
    $('#reset_password').submit(function(e) {
        // Reset thông báo lỗi
        $('#error-password').text('');
        $('#error-confirm_password').text('');

        // Kiểm tra các trường input
        var password = $('#password').val();
        var confirm_password = $('#confirm_password').val();

        // Kiểm tra mật khẩu
        if (password == '') {
            $('#error-password').text('Vui lòng nhập mật khẩu').show();
            e.preventDefault();
        } else if (!validatePassword(password)) {
            $('#error-password').text('Mật khẩu không đúng định dạng').show();
            e.preventDefault();
        }

        // Kiểm tra mật khẩu xác nhận
        if (confirm_password == '') {
            $('#error-confirm_password').text('Vui lòng nhập mật khẩu xác nhận').show();
            e.preventDefault();
        } else if (confirm_password !== password) {
            $('#error-confirm_password').text('Mật khẩu xác nhận không khớp').show();
            e.preventDefault();
        }
    });

    //Hàm validate password
    function validatePassword(password) {
        var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;
        return regex.test(password);
    }
});