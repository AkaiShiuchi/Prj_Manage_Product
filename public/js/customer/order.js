//tăng giảm số lượng sản phẩm trong đơn hàng
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

//hiển thị cổng thanh toán
$(document).ready(function() {
    $('input[name="note1"]').on('change', function() {
        if ($(this).val() === 'Thanh toán online') {
            $('#payment-gateways').show();
        } else {
            $('#payment-gateways').hide();
        }
    });
});


//thanh toán
$(document).ready(function(){
    $('#order-form').on('submit', function(e){
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        let purchaseId = $('#purchase_id').val();
        let input1 = $('input[name="note1"]:checked').val();
        let input2 = $('input[name="note2"]:checked').val();
        console.log(input1);
        console.log(input2);        

        if(input1 === 'Thanh toán online' && input2 === 'VNPAY'){
            var $form = $('<form>', {
                action: '/vn-pay/' + purchaseId,
                method: 'POST'
            });

            $form.append($('<input>', {
                type: 'hidden',
                name: '_token',
                value: $('input[name="_token"]').val()
            }));

            formData.forEach(function(value, key) {
                $form.append($('<input>', {
                    type: 'hidden',
                    name: key,
                    value: value
                }));
            });

            $('body').append($form);
            $form.submit();
        } else if(input1 === 'Thanh toán khi nhận hàng'){
            $.ajax({
                url: '/pay-order/' + purchaseId,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response){
                    window.location.href="/order-success";
                    if(response.error){
                        alert(response.message);
                        location.href="/cart";
                    }
                },
                error: function(){
                    alert('Có lỗi xảy ra khi đặt hàng.');
                }
            });
        }
    });
});