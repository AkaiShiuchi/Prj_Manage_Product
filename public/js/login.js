$(document).ready(function() {
    $('#login_form').submit(function(e) {
        // Reset thông báo lỗi
        $('#error-email').text('');
        $('#error-password').text('');

        // Kiểm tra các trường input
        var email = $('#email').val();
        var password = $('#password').val();

        // Kiểm tra email
        if (email == '') {
            $('#error-email').text('Vui lòng nhập địa chỉ email').show();
            e.preventDefault();
        } else if (!validateEmail(email)) {
            $('#error-email').text('Địa chỉ email không đúng định dạng').show();
            e.preventDefault();
        }

        // Kiểm tra mật khẩu
        if (password == '') {
            $('#error-password').text('Vui lòng nhập mật khẩu').show();
            e.preventDefault();
        } else if (!validatePassword(password)) {
            $('#error-password').text('Mật khẩu không chính xác').show();
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