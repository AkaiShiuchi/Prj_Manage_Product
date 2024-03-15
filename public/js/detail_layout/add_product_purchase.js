// Xử lý sự kiện click vào nút "Add"
// $(document).ready(function() {
//     $('#addProductModal').on('click', '.add-product-btn', function() {
//         var product = $(this).data('prod');
//         $('#addProductModal').modal('show');
//     });
// });

$(document).ready(function() {
    $('#product_id').change(function() {
        var selectedProductId = $(this).val();
        var selectedProductTotal = $('option:selected', this).data('total');
        $('#quantity').val(selectedProductTotal).attr('placeholder', 'Available: ' + selectedProductTotal);
    });
});
