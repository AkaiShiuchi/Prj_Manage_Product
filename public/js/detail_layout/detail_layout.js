//checkbox
$(document).ready(function() {
    $('#select-all-checkbox').change(function() {
        var isChecked = $(this).prop('checked');
        $('.dt-checkboxes-cell input[type="checkbox"]').prop('checked', isChecked);
    });
});
