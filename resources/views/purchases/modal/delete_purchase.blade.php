<div class="modal fade" id="deletePurchase" tabindex="-1" role="dialog" aria-labelledby="deletePurchaseLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="deletePurchaseLabel">Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if (isset($pur))
                <form action="{{ route('delete_purchase', ['id' => $pur->id]) }}" method="POST"
                    id="deletePurchaseForm">
                    <div class="modal-body">
                        @csrf
                        @method('DELETE')
                        <h5>Do you confirm the deletion of this purchase?</h5>
                        <input type="hidden" id="deletePurchaseId" name="deletePurchaseId" value="">
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
