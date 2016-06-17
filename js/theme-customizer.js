console.log('customizing!');
(function($){
	// COLORS
	wp.customize('primary_color', function(value){
		value.bind( function(new_value){
			$('.primary-color').css('color', new_value);
			$('.primary-color-bg').css('background-color', new_value);
		})
	});
	wp.customize('secondary_color', function(value){
		value.bind( function(new_value){
			$('.secondary-color').css('color', new_value);
			$('.secondary-color-bg').css('background-color', new_value);
		})
	});
	wp.customize('accent_color_one', function(value){
		value.bind( function(new_value){
			$('.accent-color-one').css('color', new_value);
			$('.accent-color-one-bg').css('background-color', new_value);
		})
	});
	wp.customize('accent_color_two', function(value){
		value.bind( function(new_value){
			$('.accent-color-two').css('color', new_value);
			$('.accent-color-two-bg').css('background-color', new_value);
		})
	});

	// FONTS
	wp.customize('paragraph_font', function(value){
		value.bind( function(new_value){
			$('.paragraph-font').css('font-family', new_value);
		})
	});
	wp.customize('h1_font', function(value){
		value.bind( function(new_value){
			$('.h1-font').css('font-family', new_value);
		})
	});
	wp.customize('h2_font', function(value){
		value.bind( function(new_value){
			$('.h2-font').css('font-family', new_value);
		})
	});
	wp.customize('h3_font', function(value){
		value.bind( function(new_value){
			$('.h3-font').css('font-family', new_value);
		})
	});
	wp.customize('h4_font', function(value){
		value.bind( function(new_value){
			$('.h4-font').css('font-family', new_value);
		})
	});
	wp.customize('nav_font', function(value){
		value.bind( function(new_value){
			$('.nav-font').css('font-family', new_value);
		})
	});
})( jQuery );