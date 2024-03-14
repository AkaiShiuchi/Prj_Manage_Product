<div class="modal fade" id="deleteProductPurchaseModal" tabindex="-1" aria-labelledby="deleteProductPurchaseModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteProductPurchaseModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('purchase_deleteProduct', ['id' => $product->id]) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" id="productIds" name="selected_products[]" value="">
                    <p>Are you sure you want to delete the selected products from the order?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
