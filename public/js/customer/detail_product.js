$(document).ready(function(){
    $('addQuickCart').on('click', function(e){
        e.preventDefault();
        let productId = $(this).data('id');
        let quantity = $('#quantity').val();

        $.ajax({
            url: '/cart',
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: productId,
                quantity: quantity
            },
            success: function(response){
                window.location.href="/cart/checkout";
            },
            error: function(){
                alert('Có lỗi xảy ra khi mua hàng.');
            }
        });
    });
});