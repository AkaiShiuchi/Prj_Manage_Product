$(document).ready(function() {
    $('.modal-trigger-btn').click(function() {
        // Hiển thị modal
        $('#viewModal').modal('show');
    });
});

$(document).ready(function() {
    $('#data_table tr:gt(0)').each(function(index) {
        var sttCell = $(this).find('td:eq(2)');
        sttCell.text(index + 1);
    });
});