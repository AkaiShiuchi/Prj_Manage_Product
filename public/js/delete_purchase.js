$(document).ready(function() {
    $('#deletePurchase').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var purchaseId = button.data('delete-id');
        var modal = $(this);
        modal.find('#deletePurchaseId').val(purchaseId);
        modal.find('#deletePurchaseForm').attr('action', '/delete-purchase/' + purchaseId);
    });
});