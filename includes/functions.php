<?php

function invx_testimonials_front($atts) {
	$args['post_type'] = 'invx_testimonials';

	if (isset($atts['limit'])):
		$args['posts_per_page'] = $atts['limit'];
	endif;

	if (isset($atts['order'])):
		$args['order'] = $atts['order'];
	else:
		$args['order'] = 'DESC';
	endif;

	$col_class = '12';
	$content_class = '10';
	$meta_class = '2';

	if (isset($atts['column'])):
		switch ($atts['column']) {
		case '1':
			$col_class = '12';
			break;
		case '2':
			$col_class = '6';
			$content_class = '8';
			$meta_class = '4';
			break;
		default:
			$col_class = '12';
			$content_class = '10';
			$meta_class = '2';
			break;
		}
	endif;

	$args['post_status'] = 'publish';

	$testimonials = new WP_Query($args);

	while ($testimonials->have_posts()): $testimonials->the_post();
		$post_id = get_the_ID();

		echo '<div id="invx_testimonial" class="testimonials-grid-main col-md-' . $col_class . ' col-sm-12 col-xs-12 padd-none"><div class="testimonials-grid col-md-12 col-sm-12 col-xs-12 padd-none">
		<div class="testimonials-content  col-md-' . $content_class . ' col-sm-10 col-xs-12">' . get_the_content() . '</div>
		<div class="testimonials-meta text-center  col-md-' . $meta_class . ' col-sm-2 col-xs-12">
		<div class="meta-content">
		<span class="testimonial-image"> ' . get_the_post_thumbnail('', 'thumbnail', '') . '</span>
		<span class="testimonial-title"><h2>' . get_the_title() . '</h2></span>
		</div></div>
	</div></div>';
	endwhile;
	wp_reset_postdata();
}

add_shortcode('testimonials-grid', 'invx_testimonials_front');

function invx_testimonials_front_slider($atts) {

	$args['post_type'] = 'invx_testimonials';

	if (isset($atts['limit'])):
		$args['posts_per_page'] = $atts['limit'];
	else:
		$args['posts_per_page'] = '6';
	endif;

	if (isset($atts['order'])):
		$args['order'] = $atts['order'];
	else:
		$args['order'] = 'DESC';
	endif;

	if (isset($atts['arrows']) && $args['arrows'] = 'false'):
		$args['arrows'] = 'false';
	else:
		$args['arrows'] = 'true';
	endif;

	if (isset($atts['arrows'])):
		switch ($atts['arrows']) {
		case 'true':
			$arrows = 'true';
			break;
		case 'false':
			$arrows = 'false';
			break;
		default:
			$arrows = 'true';
			break;
		}
	endif;

	$args['post_status'] = 'publish';

	$testimonials = new WP_Query($args);

	if ($testimonials->have_posts()):
		echo '<div class="testimonials-slider owl-carousel" id="invx_testimonials">';
		while ($testimonials->have_posts()): $testimonials->the_post();
			$post_id = get_the_ID();
			echo '<div class="testimonials-slide col-md-12 col-sm-12 col-xs-12 padd-none">
			<div class="testimonials-content  col-md-10 col-sm-10 col-xs-12">' . get_the_content() . '</div>
			<div class="testimonials-meta text-center col-md-2 col-sm-2 col-xs-12"><div class="meta-content">
			<span class="testimonial-image"> ' . get_the_post_thumbnail('', 'thumbnail', '') . '</span>
			<span class="testimonial-title"><h2>' . get_the_title() . '</h2></span>
		</div></div>
		</div>';
		endwhile;
		echo '</div>';
	endif;
	echo '<script>
	jQuery(document).ready(function($) {
	"use strict";
	// testimonials Carousel
		jQuery("#invx_testimonials").owlCarousel({
		 autoPlay:true,
		 slideSpeed : 4000,
		 responsive:true,
		 navigation:' . $arrows . ',
		 navigationText:["<i class=\'fa fa-angle-left\' ></i>","<i class=\'fa fa-angle-right\' ></i>"],
		 pagination:true,
		 paginationNumbers :false,
		 rewindSpeed:1000,
		 items:1,
		 });
	});
	</script>';
	wp_reset_postdata();
}

add_shortcode('testimonials-slider', 'invx_testimonials_front_slider');