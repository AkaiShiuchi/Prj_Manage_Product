//Validate thêm sản phẩm
$(document).ready(function() {
    $('#addProductForm').on('submit', function(event) {
        // Reset thông báo lỗi
        $('#error-name').text('');
        $('#error-describe').text('');
        $('#error-total').text('');
        $('#error-price').text('');
        $('#error-image').text('');

        //Kiểm tra các trường input
        let name = $('#name').val();
        let describe = $('#describe').val();
        let price = $('#price').val();
        let total = $('#total').val();
        let image = $('#image').val();

        if(name == ''){
            $('#error-name').text('Vui lòng nhập tên sản phẩm').show();
            event.preventDefault();
        }

        if(describe == ''){
            $('#error-describe').text('Vui lòng nhập mô tả sản phẩm').show();
            event.preventDefault();
        }

        if(price ==''){
            $('#error-price').text('Vui lòng nhập giá sản phẩm').show();
            event.preventDefault();
        } else if(isNaN(price)){
            $('#error-price').text('Giá sản phẩm phải là ký tự số').show();
            event.preventDefault();
        }

        if(total == ''){
            $('#error-total').text('Vui lòng nhập số lượng sản phẩm').show();
            event.preventDefault();
        } else if(isNaN(total)){
            $('#error-total').text('Số lượng sản phẩm phải là ký tự số').show();
            event.preventDefault();
        } else if(parseInt(total) < 1){
            $('#error-total').text('Số lượng sản phẩm phải lớn hơn hoặc bằng 1').show();
            event.preventDefault();
        }

        if (image == '') {
            $('#error-image').text('File ảnh không được để trống').show();
            event.preventDefault();
        } else {
            let allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(image)) {
                $('#error-image').text('File ảnh phải có định dạng jpg, jpeg, png hoặc gif').show();
                event.preventDefault();
            }
        }
 
        // if ($('#addProductForm').find('.is-invalid').length === 0) {
        //     event.preventDefault();
        //     $('.is-invalid').removeClass('is-invalid');
        //     $('.invalid-feedback').remove();

        //     $.ajax({
        //         url: $(this).attr('action'),
        //         method: $(this).attr('method'),
        //         data: new FormData(this),
        //         processData: false,
        //         contentType: false,
        //         success: function(response) {
        //             $('#addNewModal').modal('hide');
        //             location.reload();
        //         },
        //         error: function(xhr, status, error) {
        //             var errors = xhr.responseJSON.errors;
        //             $.each(errors, function(key, value) {
        //                 $('#addNewModal').find('#' + key).addClass('is-invalid').after('<div class="invalid-feedback">' + value + '</div>');
        //             });
        //         }
        //     });
        // }
    });
});

//search product
$(document).ready(function() {
    $('#search_product').on('submit', function(event) {
        event.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: $(this).serialize(),
            success: function(response) {
                $('#products_table').html(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});

//search product category
$(function() {
	$('select[multiple].multise').multiselect({
	  columns: 3,
	  placeholder: 'Select Product Categories',
	  search: true,
	  searchOptions: {
	      'default': 'Search Category'
	  },
	  selectAll: true
	});
});