<?php

add_action('init', 'invxt_register_post_types');
function invxt_register_post_types() {
	$labels = array(
		'name' => __('Testimonials Grid [testimonials-grid] & Slider [testimonials-slider]', 'innvonix-testimonials'),
		'singular_name' => __('Testimonial', 'innvonix-testimonials'),
		'menu_name' => __('testimonials', 'innvonix-testimonials'),
		'name_admin_bar' => __('testimonials', 'innvonix-testimonials'),
		'add_new' => __('Add New', 'innvonix-testimonials'),
		'add_new_item' => __('Add New Testimonial', 'innvonix-testimonials'),
		'edit_item' => __('Edit Testimonial', 'innvonix-testimonials'),
		'new_item' => __('New Testimonial', 'innvonix-testimonials'),
		'view_item' => __('View Testimonial', 'innvonix-testimonials'),
		'search_items' => __('Search Testimonial', 'innvonix-testimonials'),
		'not_found' => __('No Testimonials Found', 'innvonix-testimonials'),
		'not_found_in_trash' => __('No testimonials found in trash', 'innvonix-testimonials'),
		'all_items' => __('All Testimonials', 'innvonix-testimonials'),
	);

	$args = array(
		"label" => __('INVX testimonials', 'innvonix-testimonials'),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		'menu_icon' => 'dashicons-format-quote',
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array("slug" => "invx_testimonials", "with_front" => true, 'pages' => true, 'feeds' => true),
		"query_var" => true,
		'capabilities' => array(

			// meta caps (don't assign these to roles)
			'edit_post' => 'edit_testimonials_item',
			'read_post' => 'read_testimonials_item',
			'delete_post' => 'delete_testimonials_item',

			// primitive/meta caps
			'create_posts' => 'create_testimonials',

			// primitive caps used outside of map_meta_cap()
			'edit_posts' => 'edit_testimonials',
			'edit_others_posts' => 'manage_testimonials',
			'publish_posts' => 'manage_testimonials',
			'read_private_posts' => 'read',

			// primitive caps used inside of map_meta_cap()
			'read' => 'read',
			'delete_posts' => 'manage_testimonials',
			'delete_private_posts' => 'manage_testimonials',
			'delete_published_posts' => 'manage_testimonials',
			'delete_others_posts' => 'manage_testimonials',
			'edit_private_posts' => 'edit_testimonials',
			'edit_published_posts' => 'edit_testimonials',
		),

		"supports" => array("title", "editor", "thumbnail", "author"),
	);
	register_post_type("invx_testimonials", $args);

// End of invxt_register_post_types()
}
