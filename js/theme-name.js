jQuery(document).ready(function(jQuery) {
	console.log('extra!');
    jQuery('.extra-slider').extraSlider({
    	type: 'fade',
    	'auto': 5, // Delay, seconds.
    	'speed': 1, // Transition speed, seconds.
        'keyboard': true,
    });

});