//chuyển đổi overview và history
$(document).ready(function(){
    $('#tabList a.nav-link').click(function(event) {
        event.preventDefault();
    
        var targetId = $(this).data('target');
    
        $('#tabList a.nav-link').removeClass('active');
        $(this).addClass('active');
    
        $('.ca.card.mb-4').removeClass('active');
        $('.ca.card.mb-4').hide();
        $('#' + targetId).addClass('active').show();
    });
});

//validate frontend add new user
$(document).ready(function(){
    $('#addNewUserForm').submit(function(e){
        //reset thông báo lỗi
        $('#error-name').text('');
        $('#error-email').text('');
        $('#error-password').text('');
        $('#error-confirm_password').text('');
        $('#error-role').text('');

        //validate các trường input
        let name = $('#name').val();
        let email = $('#email').val();
        let password = $('#password').val();
        let confirm_password = $('#confirm_password').val();
        let role = $('#user_role').val();

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
            $('#error-email').text('Vui lòng nhập đúng địa chỉ email').show();
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

        // Kiểm tra chọn phân quyền
        if (role == '') {
            $('#error-role').text('Vui lòng chọn quyền cho người dùng').show();
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