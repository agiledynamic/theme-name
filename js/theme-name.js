/* 
* Slider control 
*/
console.log("foobar");
jQuery(document).ready(function(jQuery) {
    jQuery('.extra-slider').extraSlider({
    	type: 'fade',
    	'auto': 5, // Delay, seconds.
    	'speed': 1, // Transition speed, seconds.
        'keyboard': false,
    });

});
