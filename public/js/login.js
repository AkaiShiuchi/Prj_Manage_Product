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