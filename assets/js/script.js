(function($) {
    'use strict';

    // Tab switching
    $(document).on('click', '.wcup-tab-btn', function(e) {
        e.preventDefault();
        
        var tab = $(this).data('tab');
        
        $('.wcup-tab-btn').removeClass('active');
        $(this).addClass('active');
        
        $('.wcup-tab-content').hide();
        $('#' + tab + '-tab').show();
    });

})(jQuery);
