<div class="modal fade" id="delete_proPur" tabindex="-1" aria-labelledby="delete_proPurLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_proPurLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id="deleteProductPurchaseForm">
                <div class="modal-body">
                    @csrf
                    <p>Are you sure you want to delete the selected products from the order?</p>
                    <ul id="selectedProductsList"></ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
