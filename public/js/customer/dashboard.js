$(document).ready(function() {
    $('#iconOpen').click(function() {
        var $content = $('#descriptionContent');
        var $icon = $(this);

        if ($content.hasClass('open')) {
            $content.removeClass('open').slideUp();
            $icon.removeClass('active');
        } else {
            $content.addClass('open').slideDown();
            $icon.addClass('active');
        }
    });
});

//Mở modal xem chi tiết sản phẩm
$(document).ready(function() {
    $('.quickView').on('click', function() {
        var productId = $(this).data('id');

        $.ajax({
            url: '/get-product-details',
            method: 'GET',
            data: { id: productId },
            success: function(response) {
                $('#productName').text(response.name);
                $('#productImage').attr('src', '/storage/uploads/' + response.image);
                $('#productImageLink').attr('href', '/storage/uploads/' + response.image);
                $('#productImageCarousel').attr('src', '/storage/uploads/' + response.image);
                $('#productPrice').text(response.price + '₫');
                $('#productDescription').text(response.describe);
                $('#product_id').val(response.id);

                if (response.total > 0) {
                    $('#productStatus').text('Còn hàng');
                } else {
                    $('#productStatus').text('Hết hàng');
                }

                $('#productDetailLink').attr('href', '/product-detail/' + response.id);
            },
            error: function() {
                alert('Unable to fetch product details. Please try again.');
            }
        });
    });
});

//thêm sản phẩm vào giỏ hàng
$(document).ready(function() {
    $('#add-item-form').on('click', '#add-to-cart', function(event) {
        event.preventDefault();
        var productId = $('#product_id').val();
        var quantity = $('#quantity').val();

        $.ajax({
            url: '/add-item-cart/' + productId, 
            method: 'POST',
            data: {
                _token: $('input[name="_token"]').val(),
                quantity: quantity
            },
            success: function(response) {
                if (response.success) {
                    $('#cart-view tbody').html(response.cartHtml);
                    $('#total-view-cart').text(response.total + '₫');
                    $('#totalCartItems_hidden').val(response.totalItems);
                    $('.textCartSide b').text(response.totalItems);
                    $('.icon-cart .count').text(response.totalItems);

                    // Hiển thị modal giỏ hàng
                    $('#site-nav--mobile').addClass('active show-cart');
                } else {
                    alert('Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng.');
                }
            },
            error: function() {
                alert('Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng. Vui lòng thử lại sau.');
            }
        });
    });

    // Xử lý khi nhấn vào nút xóa sản phẩm khỏi giỏ hàng
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
                    $('#cart-view tbody').html(response.cartHtml);
                    $('#total-view-cart').text(response.total + '₫');
                    $('#totalCartItems_hidden').val(response.totalItems);
                    $('.textCartSide b').text(response.totalItems);
                    window.location.reload();
                    // Hiển thị modal giỏ hàng nếu cần
                    $('#site-nav--mobile').addClass('active show-cart');
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

//lấy thông tin giỏ hàng
$(document).ready(function() {
    $.ajax({
        url: '/get-cart',
        method: 'GET',
        success: function(response) {
            $('#cart-view tbody').html(response.cartHtml);
            $('#total-view-cart').text(response.total + '₫');
            $('#totalCartItems_hidden').val(response.totalItems);
            $('.textCartSide b').text(response.totalItems);
            $('.icon-cart .count').text(response.totalItems); // Cập nhật số lượng sản phẩm trong biểu tượng giỏ hàng
        },
        error: function() {
            console.error('Có lỗi xảy ra khi lấy thông tin giỏ hàng.');
        }
    });
});
