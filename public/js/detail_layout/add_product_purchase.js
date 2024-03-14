$(document).ready(function() {
    // Xử lý sự kiện click vào nút "Add"
    $(document).on('click', '.add-product-btn', function() {
        var product = $(this).data('prod');
        $('#addProductModal').modal('show');
    });
});