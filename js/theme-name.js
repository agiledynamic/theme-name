/* 
* Extra Slider
*/
jQuery(document).ready(function(jQuery) {
    jQuery('.extra-slider').extraSlider({
    	type: 'fade',
    	'auto': 5, // Delay, seconds.
    	'speed': 1, // Transition speed, seconds.
        'keyboard': true,
    });

    //jQuery('.pagination > a').addClass('secondary-color-bg');
});

/* 
* Menu background change
*/
jQuery(window).on("scroll", function() {
    if(jQuery(window).scrollTop() > 50) {
        jQuery("nav").addClass("nav-scroll");
    } else {
        //remove the background property so it comes transparent again (defined in your css)
       jQuery("nav").removeClass("nav-scroll");
    }
});
