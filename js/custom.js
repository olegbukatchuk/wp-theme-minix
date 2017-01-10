var $j = jQuery.noConflict();
jQuery(document).ready(function(){
						jQuery("blockquote").append("<div class='quote_bottom'></div>");
						});
jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop()) {
        jQuery('#scroll:hidden').stop(true, true).fadeIn();
    } else {
        jQuery('#scroll').stop(true, true).fadeOut();
    }
});