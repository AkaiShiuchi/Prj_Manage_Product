$(document).ready(function() {
    $(document).on('click', '.add-down', function() {
        var $input = $(this).siblings('.item-quantity');
        var currentValue = parseInt($input.val());
        var minValue = parseInt($input.attr('min'));
        var productId = $(this).data('id');
        if (currentValue > minValue) {
            $input.val(currentValue - 1);
            updateQuantity(productId, currentValue - 1);
        }
    });

    $(document).on('click', '.add-up', function() {
        var $input = $(this).siblings('.item-quantity');
        var currentValue = parseInt($input.val());
        var maxValue = parseInt($input.attr('max'));
        var productId = $(this).data('id');
        if (currentValue < maxValue) {
            $input.val(currentValue + 1);
            updateQuantity(productId, currentValue + 1);
        }
    });

    function updateQuantity(productId, quantity) {
        $.ajax({
            url: '/cart/add',
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                product_id: productId,
                quantity: quantity
            },
            success: function(response) {
                if (response.success) {
                    console.log('Số lượng sản phẩm đã được cập nhật.');
                    window.location.reload();
                } else {
                    console.log('Cập nhật số lượng sản phẩm thất bại.');
                    window.location.reload();
                }
            },
            error: function() {
                console.log('Có lỗi xảy ra khi cập nhật số lượng sản phẩm.');
            }
        });
    }
});
