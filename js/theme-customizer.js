console.log('customizing!');
(function($){
	wp.customize('paragraph_font_color', function(value){
		value.bind( function(new_value){
			$('p.theme-font-color').css('color', new_value);
		})
	});
	wp.customize('h1_font_color', function(value){
		value.bind( function(new_value){
			$('h1.theme-font-color').css('color', new_value);
		})
	});
	wp.customize('h2_font_color', function(value){
		value.bind( function(new_value){
			$('h2.theme-font-color').css('color', new_value);
		})
	});
	wp.customize('h3_font_color', function(value){
		value.bind( function(new_value){
			$('h3.theme-font-color').css('color', new_value);
		})
	});
})( jQuery );