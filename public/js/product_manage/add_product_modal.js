function previewFile() {
    var preview = $('#img')[0];
    var fileInput = $('#image').prop('files')[0];
    if (window.FileReader) {
        if (fileInput) {
            var reader = new FileReader();
            reader.onloadend = function () {
                $(preview).attr('src', reader.result);
                $(preview).show();
            }
            reader.readAsDataURL(fileInput);
        } else {
            $(preview).attr('src', '');
            $(preview).hide();
        }
    } else {
        alert("Trình duyệt của bạn không hỗ trợ FileReader.");
    }
}
