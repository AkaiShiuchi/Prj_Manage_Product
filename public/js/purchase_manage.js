//hiển thị modal xem detail product
$(document).ready(function() {
    $('.modal-trigger-btn').click(function() {
        // Hiển thị modal
        $('#viewModal').modal('show');
    });
});

//đánh STT đơn hàng
$(document).ready(function() {
    $('#data_table tr:gt(0)').each(function(index) {
        var sttCell = $(this).find('td:eq(2)');
        sttCell.text(index + 1);
    });
});

//checkbox
$(document).ready(function() {
    $('#select-all-checkbox').click(function() {
        var isChecked = $(this).prop('checked');
        $('#data_table tbody input[type="checkbox"]').prop('checked', isChecked);
    });
});

//checkbox thanh toán
$(document).ready(function() {
    $('input[type="checkbox"]').change(function() {
        updatePaymentForm();
    });

    function updatePaymentForm() {
        var totalQuantity = 0;
        var totalDiscount = 0;
        var totalAmount = 0;

        $('input[type="checkbox"]').each(function() {
            if ($(this).is(':checked')) {
                var row = $(this).closest('tr');
                var quantity = parseInt(row.find('.number').text());
                var discount = parseFloat(row.find('.discount').text());
                var amount = parseFloat(row.find('.amount').text());

                totalQuantity += quantity;
                totalDiscount += discount;
                totalAmount += amount;
            }
        });

        $('#total-quantity').text(totalQuantity);
        $('#total-discount').text(totalDiscount);
        $('#total-amount').text(totalAmount);
    }
});
