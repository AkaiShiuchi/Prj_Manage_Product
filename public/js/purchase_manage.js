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