$(document).ready(function() {
    $('#activateForm').submit(function(e) {
        e.preventDefault(); 
        var form = $(this);
        
        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: form.serialize(),
            success: function(response) {
                window.open(form.attr('action'), '_blank');
            },
            error: function(xhr, status, error) {
                console.error('Có lỗi xảy ra:', error);
            }
        });
    });
});