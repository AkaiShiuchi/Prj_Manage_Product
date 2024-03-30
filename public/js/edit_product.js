// <!--Function handle onchange button Upload Image-->
function previewImage(event) {
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function() {
        var dataURL = reader.result;
        var imgElement = document.getElementById('productImage');
        imgElement.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
}
