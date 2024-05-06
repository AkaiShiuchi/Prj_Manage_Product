<div class="modal fade" id="user_delete" tabindex="-1" role="dialog" aria-labelledby="user_deleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="user_deleteLabel">Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if (isset($user))
                <form action="{{ route('delete_user', ['id' => $user->id]) }}" method="POST" id="delete_form">
                    <div class="modal-body">
                        @csrf
                        @method('DELETE')
                        <h5>Do you confirm the deletion of this user?</h5>
                        <input type="hidden" id="deleteUserId" name="deleteUserId" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#user_delete').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var UserId = button.data('delete-id');
            var modal = $(this);
            modal.find('#deleteUserId').val(UserId);
            modal.find('#delete_form').attr('action', '/delete-user/' + UserId);
        });
    });
</script>
