jQuery( document ).ready(function() {

    // if(jQuery(window).width() < 500)
    // {   
    //     jQuery('.js-seaclub').appendTo('.menu-main-menu-container'); 
    // }
    jQuery('.js-open-menu').click(function(){
        jQuery(this).toggleClass('opened'); 
        jQuery('.menu-main-menu-container').toggleClass('show'); 
    });

    jQuery('.js-open-menu').click(function () {
        jQuery('.trp_language_switcher_shortcode').toggleClass('show_lang');
    });



     if(jQuery(window).width() < 780)
        {
         jQuery('.footerAccordions .footerLinksBody').hide();
         jQuery('.footerLinksHeader h6').click(function () {
             let pressed = jQuery(this).closest('li').find('.footerLinksBody');

             if (pressed.hasClass('active')) {
                 pressed.removeClass('active');
                 jQuery('.footerAccordions .footerLinksBody').hide(500);
             } else {
                 jQuery('.footerAccordions .footerLinksBody').hide(500);
                 jQuery(this).closest('li').find('.footerLinksBody').show(500);
                 pressed.addClass('active');

             }

         });

        }

});  