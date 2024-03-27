//Delete ProductPurchase
// $(document).ready(function() {
//     $('#delete_proPur').on('show.bs.modal', function(event) {
//         console.log(12345);
//         let purchase_id = $(event.relatedTarget).data('purchase-id');
//         console.log(purchase_id);

//         let selectedIds = $('input[name="selected_products[]"]:checked').map(function() {
//             return $(this).val();
//         }).get();
//         console.log(selectedIds);
        
//         // Hiển thị danh sách ID đã chọn trong modal
//         let selectedProductsList = $('#selectedProductsList');
//         selectedProductsList.empty();
//         selectedIds.forEach(function(id) {
//             selectedProductsList.append('<li>' + id + '</li>');
//         });

//         // Cập nhật danh sách ID vào input hidden trong form
//         $('#selectedProducts').val(selectedIds.join(','));
//         $('#purchase_id').val(purchase_id);
//         $('#deleteProductPurchaseForm').attr('action', '/delete-product-purchase/' + purchase_id);
//     });

//     $('#deleteProductPurchaseForm').on('submit', function(event) {
//         // Ngăn chặn gửi form mặc định để xử lý bằng JavaScript
//         event.preventDefault();
        
//         // Lấy danh sách ID từ input hidden
//         let selectedIds = $('#selectedProducts').val().split(',');

//         let purchase_id = $('#purchase_id').val();

//         // Gửi danh sách ID đến route và controller
//         $.ajax({
//             url: "/delete-product-purchase/" + purchase_id,
//             type: 'POST',
//             data: {
//                 _token: $(this).find('input[name="_token"]').val(),
//                 selected_products: selectedIds
//             },
//             // success: function(response) {
//             //     console.log(response);
//             // },
//             // error: function(xhr, status, error) {
//             //     console.error(xhr.responseText);
//             // }
//         });
//     });
// });
$(document).ready(function() {
    $('#delete_product_purchase').on('click', function(event) {
        event.preventDefault();

        var purchaseId = $(this).data('purchase');
        console.log(purchaseId);

        var selectedIds = [];
        $('input[name="selected_products[]"]:checked').each(function() {
            selectedIds.push($(this).val());
        });
        console.log(selectedIds);

        if (selectedIds.length === 0) {
            alert('Please select at least one product to delete.');
            return ;
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // alert(purchaseId);

        $.ajax({
            url: '/delete-product-purchase/' + purchaseId,
            type: 'POST',
            data: { selected_products: selectedIds },
            success: function(response) {
                window.location.reload();
            },
            error: function(xhr, status, error) {
                window.location.reload();
            }
        });
    });
});
