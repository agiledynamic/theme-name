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
			$('.pagination > a').css('border-color', new_value);
			$('.pagination a.extra-slider-link-active').css('background-color', new_value);
			$('.pagination a:hover').css('background-color', new_value);
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
			$('.nav-scroll').css('background-color', new_value);
		})
	});

	// FONTS
	wp.customize('paragraph_font', function(value){
		value.bind( function(new_value){
			jQuery("head").append("<link id="+ new_value +" href='https://fonts.googleapis.com/css?family="+new_value.trim()+"' rel='stylesheet' type='text/css'>");
			$('.paragraph-font').css('font-family', new_value.trim());
		})
	});
	wp.customize('h1_font', function(value){
		value.bind( function(new_value){
			jQuery("head").append("<link id="+ new_value +" href='https://fonts.googleapis.com/css?family="+new_value.trim()+"' rel='stylesheet' type='text/css'>");
			$('.h1-font').css('font-family', new_value);
		})
	});
	wp.customize('h2_font', function(value){
		value.bind( function(new_value){
			jQuery("head").append("<link id="+ new_value +" href='https://fonts.googleapis.com/css?family="+new_value.trim()+"' rel='stylesheet' type='text/css'>");
			$('.h2-font').css('font-family', new_value);
		})
	});
	wp.customize('h3_font', function(value){
		value.bind( function(new_value){
			jQuery("head").append("<link id="+ new_value +" href='https://fonts.googleapis.com/css?family="+new_value.trim()+"' rel='stylesheet' type='text/css'>");
			$('.h3-font').css('font-family', new_value);
		})
	});
	wp.customize('h4_font', function(value){
		value.bind( function(new_value){
			jQuery("head").append("<link id="+ new_value +" href='https://fonts.googleapis.com/css?family="+new_value.trim()+"' rel='stylesheet' type='text/css'>");
			$('.h4-font').css('font-family', new_value);
		})
	});
	wp.customize('nav_font', function(value){
		value.bind( function(new_value){
			jQuery("head").append("<link id="+ new_value +" href='https://fonts.googleapis.com/css?family="+new_value.trim()+"' rel='stylesheet' type='text/css'>");
			$('.nav-font').css('font-family', new_value);
		})
	});

	// Layout
	wp.customize('layout_container', function(value){
		value.bind( function(new_value){
			jQuery('.container').removeClass('container').addClass(new_value.trim());
			jQuery('.container-fluid').removeClass('container-fluid').addClass(new_value.trim());
		})
	});

})( jQuery );