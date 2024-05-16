$(document).ready(function() {
    $('#formAcount').submit(function(e) {
        // Reset thông báo lỗi
        $('#error-name').text('');
        $('#error-email').text('');
        $('#error-password').text('');
        $('#error-confirm_password').text('');

        // Kiểm tra các trường input
        var name = $('#name').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var confirm_password = $('#confirm_password').val();

        // Kiểm tra tên người dùng
        if (name == '') {
            $('#error-name').text('Vui lòng nhập tên người dùng').show();
            e.preventDefault();
        } else if (name.length < 6) {
            $('#error-name').text('Tên người dùng phải có ít nhất 6 ký tự').show();
            e.preventDefault();
        }

        // Kiểm tra email
        if (email == '') {
            $('#error-email').text('Vui lòng nhập địa chỉ email').show();
            e.preventDefault();
        } else if (!validateEmail(email)) {
            $('#error-email').text('Email không đúng định dạng').show();
            e.preventDefault();
        }

        // Kiểm tra mật khẩu
        if (password == '') {
            $('#error-password').text('Vui lòng nhập mật khẩu').show();
            e.preventDefault();
        } else if (!validatePassword(password)) {
            $('#error-password').text('Mật khẩu phải chứa ít nhất một chữ cái viết hoa, một chữ cái viết thường, một kí tự số và một kí tự đặc biệt, có ít nhất 6 ký tự').show();
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
