jQuery(document).ready(function(jQuery) {
	console.log('extra!');
    jQuery('.extra-slider').extraSlider({
    	type: 'fade',
    	'auto': 5, // Delay, seconds.
    	'speed': 1, // Transition speed, seconds.
        'keyboard': true,
    });

    jQuery('.extra-slider').on('extra:slider:moveStart', function(event, currentItem, currentIndex, previousIndex, unfilteredCurrentIndex) {
    	console.log('hello!');
    	/*
		var $img = $('.slider-item');
		TweenMax.set($img,{ backgroundSize:"cover" });
		var freewayEaseTween = TweenMax.to($img, 10, {
		  backgroundSize: "+=25% +=25%", 
		  autoRound:false, 
		  repeat:-1,
		  yoyo:true,
		  ease:Power1.ease0ut
		});
		freewayEaseTween.play();
		*/
    });

});