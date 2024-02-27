document.getElementById('search_button').addEventListener('click', function(event) {
    // Lấy các trường nhập liệu và dropdown
    var productNameInput = document.getElementById('product_name');
    var categoryIdSelect = document.getElementById('category_id');
    var searchButton = document.getElementById('search_button');

    // Kiểm tra nếu trường sản phẩm và dropdown không hợp lệ
    if (productNameInput.value.trim() === '' && categoryIdSelect.value === '0') {
        // Ngăn chặn form được gửi đi
        event.preventDefault();
        // Thông báo cho người dùng nhập giá trị hoặc chọn dropdown
        alert('Vui lòng nhập tên sản phẩm hoặc chọn thể loại.');
    }
});