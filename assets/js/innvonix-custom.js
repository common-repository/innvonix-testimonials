/*
 * Custom jQuery by INNVONIX 
 *
 * CopyRight (C) 2017 by INNVONIX TECHNOLOGIES LLP.
 * http://www.innvonix.com
 *

*/
jQuery(document).ready(function(){
	if( jQuery(window).width() > 768 ){
		var content_height_grid = jQuery('.testimonials-grid').height();
		jQuery('.testimonials-grid .testimonials-meta').css('height', content_height_grid);
		var content_height_slide = jQuery('.testimonials-slide').height();
		jQuery('.testimonials-slide .testimonials-meta').css('height', content_height_slide);
	}	
});

jQuery(document).on('load',function(){
	if( jQuery(window).width() > 768 ){
		var content_height_grid = jQuery('.testimonials-grid').height();
		jQuery('.testimonials-grid .testimonials-meta').css('height', content_height_grid);
		var content_height_slide = jQuery('.testimonials-slide').height();
		jQuery('.testimonials-slide .testimonials-meta').css('height', content_height_slide);
	}	
});

jQuery(window).resize(function(){
	if( jQuery(window).width() > 768 ){
		var content_height_grid = jQuery('.testimonials-grid').height();
		jQuery('.testimonials-grid .testimonials-meta').css('height', content_height_grid);
		var content_height_slide = jQuery('.testimonials-slide').height();
		jQuery('.testimonials-slide .testimonials-meta').css('height', content_height_slide);
	}	
});
	if( jQuery(window).width() > 768 ){
		var content_height_grid = jQuery('.testimonials-grid').height();
		jQuery('.testimonials-grid .testimonials-meta').css('height', content_height_grid);
		var content_height_slide = jQuery('.testimonials-slide').height();
		jQuery('.testimonials-slide .testimonials-meta').css('height', content_height_slide);
	}