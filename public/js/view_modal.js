$(document).on('click', '.modal-trigger-btn', function() {
    var productId = $(this).data('product-id');
    $.ajax({
        url: '/purchase-manage/view-detail/' + productId,
        type: 'GET',
        success: function(response) {
            $('#name').text(response.name);
            $('#image').attr('src', 'storage/uploads/' + response.image);
            $('#total').text(response.total);
            $('#price').text(response.price);
            $('#describe').text(response.describe);
            
            $.ajax({
                url: '/get-category/' + response.category_id,
                type: 'GET',
                success: function(categoryResponse) {
                    $('#category').text(categoryResponse.name);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
});
