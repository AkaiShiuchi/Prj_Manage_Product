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
