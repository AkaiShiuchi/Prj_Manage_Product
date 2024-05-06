$(document).ready(function(){
    $('#update_role').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var roleUrl = button.data('role-url');
        var userName = button.data('user-name');
        var userEmail = button.data('user-email');
        var userRole = button.data('user-role');
        var modal = $(this);
        
        modal.find('#name').val(userName);
        modal.find('#email').val(userEmail);
        
        modal.find('#role').val(userRole);
        modal.find('#role_form').attr('action', roleUrl);
    });

    $('#update_role').on('show.bs.modal', function(event) {
        $('#role_form').submit(function(event) {
            event.preventDefault(); 
            console.log(134);

            var formData = $(this).serialize();

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                success: function(response) {
                    window.location.reload(); 
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
});
