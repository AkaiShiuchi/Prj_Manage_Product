//Validate thêm sản phẩm
$(document).ready(function() {
    $('#addProductForm').on('submit', function(event) {
        let name = $('#name').val();
        let describe = $('#describe').val();
        let price = $('#price').val();
        let total = $('#total').val();
        let image = $('#image').val();

        if(name == ''){
            // $('#error-name').text('Vui lòng nhập tên sản phẩm').show();
            alert('Vui lòng nhập tên sản phẩm');
            event.preventDefault();
        }

        if(describe == ''){
            alert('Vui lòng nhập mô tả sản phẩm');
            event.preventDefault();
        }

        if(price ==''){
            alert('Vui lòng nhập giá sản phẩm');
            event.preventDefault();
        } else if(isNaN(price)){
            alert('Giá sản phẩm phải là số');
            event.preventDefault();
        }

        if(total == ''){
            alert('Vui lòng nhập số lượng sản phẩm');
            event.preventDefault();
        } else if(isNaN(total)){
            alert('Số lượng sản phẩm phải là ký tự số');
            event.preventDefault();
        } else if(parseInt(total) < 1){
            alert('Số lượng sản phẩm phải lớn hơn hoặc bằng 1');
            event.preventDefault();
        }

        if (image == '') {
            alert('File ảnh không được để trống');
            event.preventDefault();
        } else {
            let allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(image)) {
                alert('File ảnh phải có định dạng jpg, jpeg, png hoặc gif');
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