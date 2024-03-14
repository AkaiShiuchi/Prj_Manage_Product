//checkbox
$('#select-all-checkbox').change(function() {
    var isChecked = $(this).prop('checked');
    $('.dt-checkboxes-cell input[type="checkbox"]').prop('checked', isChecked);
});

//Delete ProductPurchase
$(document).ready(function() {
    $(document).on('click', '#delete_proPur', function() {
        var selectedIds = $('input[name="selected_products[]"]:checked').map(function() {
            return $(this).val();
        }).get();
        if (selectedIds.length > 0) {
            $('#deleteProductPurchaseModal').modal('show');
            $('#deleteProductPurchaseModal form').attr('action', "/delete-product-purchase/" + selectedIds[0]);
        }
    });
});
