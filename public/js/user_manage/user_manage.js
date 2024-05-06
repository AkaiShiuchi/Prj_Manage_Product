//chuyển đổi overview và history
$(document).ready(function(){
    $('#tabList a.nav-link').click(function(event) {
        event.preventDefault();
    
        var targetId = $(this).data('target');
    
        $('#tabList a.nav-link').removeClass('active');
        $(this).addClass('active');
    
        $('.ca.card.mb-4').removeClass('active');
        $('.ca.card.mb-4').hide();
        $('#' + targetId).addClass('active').show();
    });
});