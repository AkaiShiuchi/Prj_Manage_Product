//checkbox
$(document).ready(function() {
    $('#select-all-checkbox').change(function() {
        var isChecked = $(this).prop('checked');
        $('.dt-checkboxes-cell input[type="checkbox"]').prop('checked', isChecked);
    });
});

//Delete ProductPurchase
// $(document).ready(function() {
//     $('#select-all-checkbox').on('change', function() {
//         // Nếu checkbox "Chọn tất cả" được chọn
//         if ($(this).prop('checked')) {
//             // Lấy tất cả các id từ checkbox khác
//             var allIds = $('input[name="selected_products[]"]').map(function() {
//                 return $(this).val();
//             }).get();
//             // Lưu tất cả các id vào thuộc tính data của modal
//             $('#delete_proPur').data('selectedIds', allIds);
//         } else {
//             // Nếu checkbox "Chọn tất cả" không được chọn, xóa dữ liệu đã lưu trong thuộc tính data của modal
//             $('#delete_proPur').removeData('selectedIds');
//         }
//     });

//     $('#delete_proPur').on('show.bs.modal', function(event) {
//         // Hiển thị danh sách id đã chọn trong modal
//         var selectedIds = $(this).data('selectedIds');
//         var selectedProductsList = $('#selectedProductsList');
//         selectedProductsList.empty();
//         if (selectedIds) {
//             selectedIds.forEach(function(id) {
//                 selectedProductsList.append('<li>' + id + '</li>');
//             });
//             // Cập nhật action của form xóa sản phẩm
//             var firstId = selectedIds.length > 0 ? selectedIds[0] : '';
//             $('#deleteProductPurchaseForm').attr('action', "/delete-product-purchase/" + firstId);
//         } else {
//             $('#deleteProductPurchaseForm').attr('action', "/delete-product-purchase"); // Nếu không có id nào được chọn, truyền action mặc định
//         }
//     });
// });
// $(document).ready(function() {
//     $('input[name="selected_products[]"]').on('change', function() {
//         // Kiểm tra xem checkbox "Chọn tất cả" có được chọn không
//         var selectAllChecked = $('#select-all-checkbox').prop('checked');

//         // Nếu checkbox "Chọn tất cả" được chọn, không lấy id từ các checkbox khác
//         if (selectAllChecked) {
//             $('#delete_proPur').removeData('selectedIds');
//         } else {
//             // Cập nhật danh sách id đã chọn vào thuộc tính data của modal
//             var selectedIds = $('input[name="selected_products[]"]:checked').map(function() {
//                 return $(this).val();
//             }).get();
//             $('#delete_proPur').data('selectedIds', selectedIds);
//         }
//     });

//     $('#delete_proPur').on('show.bs.modal', function(event) {
//         // Hiển thị danh sách id đã chọn trong modal
//         var selectedIds = $(this).data('selectedIds');
//         var selectedProductsList = $('#selectedProductsList');
//         selectedProductsList.empty();
//         if (selectedIds) {
//             selectedIds.forEach(function(id) {
//                 selectedProductsList.append('<li>' + id + '</li>');
//             });
//             // Cập nhật action của form xóa sản phẩm
//             var firstId = selectedIds.length > 0 ? selectedIds[0] : '';
//             $('#deleteProductPurchaseForm').attr('action', "/delete-product-purchase/" + firstId);
//         } else {
//             $('#deleteProductPurchaseForm').attr('action', "/delete-product-purchase"); // Nếu không có id nào được chọn, truyền action mặc định
//         }
//     });
// });
$(document).ready(function() {
    $('#delete_proPur').on('show.bs.modal', function(event) {
        var selectedIds = $('input[name="selected_products[]"]:checked').map(function() {
            return $(this).val();
        }).get();
        
        // Hiển thị danh sách ID đã chọn trong modal
        var selectedProductsList = $('#selectedProductsList');
        selectedProductsList.empty();
        selectedIds.forEach(function(id) {
            selectedProductsList.append('<li>' + id + '</li>');
        });

        // Cập nhật danh sách ID vào input hidden trong form
        $('#selectedProducts').val(selectedIds.join(','));

        // Cập nhật action của form xóa sản phẩm
        var actionUrl = selectedIds.length > 0 ? "/delete-product-purchase/" + selectedIds.join(',') : "/delete-product-purchase";
        $('#deleteProductPurchaseForm').attr('action', actionUrl);
    });

    $('#deleteProductPurchaseForm').on('submit', function(event) {
        // Ngăn chặn gửi form mặc định để xử lý bằng JavaScript
        event.preventDefault();
        
        // Lấy danh sách ID từ input hidden
        var selectedIds = $('#selectedProducts').val().split(',');

        // Gửi danh sách ID đến route và controller
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: {
                _token: $(this).find('input[name="_token"]').val(),
                selected_products: selectedIds
            },
            success: function(response) {
                // Xử lý kết quả thành công
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Xử lý lỗi
                console.error(xhr.responseText);
            }
        });
    });
});





