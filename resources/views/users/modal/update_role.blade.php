<div class="modal fade" id="update_role" tabindex="-1" role="dialog" aria-labelledby="update_roleLabel" aria-hidden="true">
    <div class="mdal modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="update_roleLabel">Update Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if (isset($user))
                <form action="{{ route('update_role', ['id' => $user->id]) }}" method="POST" id="role_form">
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">User Name:</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        value="" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="role">Select Role:</label>
                                    <select class="form-control" id="role" name="role">
                                        <option value="Administrator" id="role1">Administrator</option>
                                        <option value="Customer" id="role2">Customer</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" id="updateBtn">Update</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>

{{-- <script>
    $(document).ready(function() {
        $('#update_role').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var roleUrl = button.data('role-url');
            var userName = button.data('user-name');
            var userEmail = button.data('user-email');
            var userRole = button.data('user-role');
            console.log(userEmail);
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
</script> --}}
