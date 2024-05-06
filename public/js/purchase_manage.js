//hiển thị modal xem detail product
$(document).ready(function() {
    $('.modal-trigger-btn').click(function() {
        // Hiển thị modal
        $('#viewModal').modal('show');
    });
});

//đánh STT đơn hàng
// $(document).ready(function() {
//     $('#data_table tr:gt(0)').each(function(index) {
//         var sttCell = $(this).find('td:eq(0)');
//         sttCell.text(index + 1);
//     });
// });

//checkbox
$(document).ready(function() {
    $('#select-all-checkbox').click(function() {
        var isChecked = $(this).prop('checked');
        $('#data_table tbody input[type="checkbox"]').prop('checked', isChecked);
    });
});

//search 
$(document).ready(function() {
    $('#search_purchase_form').on('submit', function(event) {
        event.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: $(this).serialize(),
            success: function(response) {
                $('#data_table').html(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});

//chuyển đổi overview và history
$(document).ready(function(){
    $('#tabList a.nav-link').click(function(event) {
        event.preventDefault();
    
        var targetId = $(this).data('target');
    
        $('#tabList a.nav-link').removeClass('active');
        $(this).addClass('active');
    
        $('.ca.card.mb-4').removeClass('active');
        $('.ca.card.mb-4').hide();
        $('#' + targetId).addClass('active').show();
    });
});
