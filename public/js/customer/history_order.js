// xử lý nút Hủy đặt hàng
$(document).ready(function(){
    $('.cancelOrder').on('click', function(e){
        e.preventDefault();
        let purchaseId = $(this).data('id');

        $.ajax({
            url: '/cancel-order/' + purchaseId,
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
                location.reload();
            },
            error: function(){
                alert('Có lỗi xảy ra khi hủy đơn hàng.')
            }
        });
    });
});

//xử lý nút mua lại
$(document).ready(function(){
    $('.buyback').on('click', function(e){
        e.preventDefault();
        let purchaseId = $(this).data('id');

        $.ajax({
            url: '/buyback/' + purchaseId,
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
                alert(response.message);
                    window.location.href = '/cart';
            },
            error: function(){
                alert('Có lỗi xảy ra khi mua lại.');
            }
        });
    });
});