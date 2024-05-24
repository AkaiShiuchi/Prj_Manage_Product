//tăng giảm số lượng sản phẩm trong đơn hàng
$(document).ready(function() {
    $(document).on('click', '.add-down', function() {
        var $input = $('.item-quantity');
        var currentValue = $input.val();
        var minValue = parseInt($input.attr('min'));
        var productId = $(this).data('id');
        var price = $('#price');
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
        var single_price = $('#price').val();
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
                    $('#showTotalMoney').text(response.sum_total_price + '₫');
                } else {
                    console.log('Cập nhật số lượng sản phẩm thất bại.');
                }
            },
            error: function() {
                console.log('Có lỗi xảy ra khi cập nhật số lượng sản phẩm.');
            }
        });
    }
});

//xóa sản phẩm khỏi đơn hàng
$(document).ready(function(){
    $(document).on('click', '.cart_remove', function() {
        var productId = $(this).data('id');

        $.ajax({
            url: '/remove-item-cart/' + productId,
            method: 'DELETE',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    $('#showTotalMoney').text(response.total + '₫');
                    $('#totalCartItems_hidden').val(response.totalItems);
                    $('.textCartSide b').text(response.totalItems);
                    $('#cart-view tbody').html(response.cartHtml);
                    window.location.reload();
                } else {
                    alert(response.message || 'Có lỗi xảy ra khi xóa sản phẩm khỏi giỏ hàng.');
                }
            },
            error: function() {
                alert('Có lỗi xảy ra khi xóa sản phẩm khỏi giỏ hàng. Vui lòng thử lại sau.');
            }
        });
    });
});

