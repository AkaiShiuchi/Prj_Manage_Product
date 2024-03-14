$(document).ready(function () {
    $('tbody tr').each(function (index) {
        $(this).find('td:first').text(index + 1);
    });
});