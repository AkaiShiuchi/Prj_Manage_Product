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