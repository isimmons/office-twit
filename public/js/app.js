(function($) {
    // Display flash message for two seconds unless important
    $('div.flash_error').not('.flash_important').delay(2000).slideUp();
    $('div.flash_info').not('.flash_important').delay(2000).slideUp();
    $('div.flash_success').delay(2000).slideUp();
    
})(jQuery);