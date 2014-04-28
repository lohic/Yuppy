<?php

add_theme_support( 'post-thumbnails' );

add_image_size( 'medium', 900, 500, true ); 


// https://github.com/twittem/wp-bootstrap-navwalker
require_once('inc/wp_bootstrap_navwalker.php');

if ( function_exists('register_sidebar') )
register_sidebar(
	array(
		'name'=>'Sidebar',
		'before_widget' => '<div id="%1$s" class="widget col-12 col-md-12 col-sm-6 col-xs-12 %2$s">',
		'after_widget'  => "</div>\n"
	)
);

if ( function_exists('register_nav_menus') )
register_nav_menus(
	array(
		'main_menu'	=> __('Menu principal')
	)
);


$background_presets = array(
	'default-color'          => '',
	//'default-image'          => get_template_directory_uri() . '/images/background.jpg',
	'default-repeat'         => '',
	'default-position-x'     => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);

add_theme_support( 'custom-background', $background_presets  );



//
//http://scribu.net/wordpress/posts-to-posts/
if( ! function_exists (my_connection_types)) {
	function my_connection_types() {
		p2p_register_connection_type( array(
			'name' => 'album_to_records',
			'from' => 'record',
			'to' => 'album',
			'reciprocal' => true,
			//'title' => 'Albums',
			'title' => array( 'from' => 'Albums', 'to' => 'Artiste' ),
			'cardinality' => 'one-to-many',
		) );
	}
}


if( ! function_exists (my_register_post_types)) {
	function my_register_post_types() {

		register_post_type(
			'record',
			array(
				'label' => __('Records'),
				'singular_label' => __('Record'),
				'public' => true,
				'show_ui' => true,
				//'show_in_menu' => false,
				//'menu_icon'=> get_bloginfo('template_directory') .'/images/favicon.png',
				'show_in_nav_menus'=> false,
				'capability_type' => 'page',
				'rewrite' => array("slug" => "record"),
				'hierarchical' => false,
				'query_var' => false,
				'supports' => array('title','custom-fields','editor','thumbnail'),
				'menu_position' => 20,
				//'taxonomies' => 
			)
		);	

		register_post_type(
			'discographie',
			array(
				'label' => __('Discographies'),
				'singular_label' => __('Discographie'),
				'public' => true,
				'show_ui' => true,
				//'show_in_menu' => false,
				//'menu_icon'=> get_bloginfo('template_directory') .'/images/favicon.png',
				'show_in_nav_menus'=> false,
				'capability_type' => 'post',
				'rewrite' => array("slug" => "discographie"),
				'hierarchical' => false,
				'query_var' => false,
				'supports' => array('title','editor','excerpt','thumbnail'),
				'menu_position' => 21,
			)
		);


		register_post_type(
			'groupe',
			array(
				'label' 			=> __('Booking'),
				'singular_label' 	=> __('Booking'),
				'public' 			=> true,
				'show_ui' 			=> true,
				//'show_in_menu' 	=> false,
				//'menu_icon'		=> get_bloginfo('template_directory') .'/images/favicon.png',
				'show_in_nav_menus'	=> false,
				'capability_type' 	=> 'page',
				'rewrite' 			=> array("slug" => "booking"),
				'hierarchical' 		=> false,
				'query_var' 		=> false,
				'supports' 			=> array('title','editor','thumbnail'),
				'menu_position' 	=> 22,
				//'taxonomies' 		=> 'genre'
			)
		);
	}
}


if( ! function_exists (my_register_taxonomies)) {
	function my_register_taxonomies() {
	
		$labels = array(
			'name' 				=> _x( 'Genres', 'taxonomy general name' ),
			'singular_name' 	=> _x( 'Genre',  'taxonomy singular name' ),
			'search_items'      => __( 'Recherche un genre' ),
			'all_items'			=> __( 'Tous les genres' ),
			'parent_item' 		=> null,
			'parent_item_colon' => null,
			//'show_ui' 		=> false,
			'menu_name' 		=> __( 'Genres' ),
		); 
	
		register_taxonomy('genre','discographie',array(
			'hierarchical' 		=> false,
			'labels' 			=> $labels,
			'show_ui' 			=> true,
			'query_var' 		=> true,
			'show_in_nav_menus' => true,
			'show_admin_column' => true,
			'rewrite' 			=> array( 'slug' => 'genre' ),
		));


		$labels = array(
			'name' 				=> _x( 'Albums', 'taxonomy general name' ),
			'singular_name' 	=> _x( 'Album',  'taxonomy singular name' ),
			'search_items'      => __( 'Rechercher un album' ),
			'all_items'			=> __( 'Tous les albums' ),
			'parent_item' 		=> null,
			'parent_item_colon' => null,
			//'show_ui' 		=> false,
			'menu_name' 		=> __( 'Albums' ),
		); 


		register_taxonomy('album','post',array(
			'hierarchical' 		=> false,
			'labels' 			=> $labels,
			'show_ui' 			=> true,
			'query_var' 		=> true,
			'show_in_nav_menus' => true,
			'show_admin_column' => true,
			'rewrite' 			=> array( 'slug' => 'album' ),
		));


		$labels = array(
			'name' 				=> _x( 'Labels', 'taxonomy general name' ),
			'singular_name' 	=> _x( 'Label',  'taxonomy singular name' ),
			'search_items'      => __( 'Rechercher un label' ),
			'all_items'			=> __( 'Tous les labels' ),
			'parent_item' 		=> null,
			'parent_item_colon' => null,
			//'show_ui' 		=> false,
			'menu_name' 		=> __( 'Labels' ),
		); 


		register_taxonomy('label','post',array(
			'hierarchical' 		=> false,
			'labels' 			=> $labels,
			'show_ui' 			=> true,
			'query_var' 		=> true,
			'show_in_nav_menus' => true,
			'show_admin_column' => true,
			'rewrite' 			=> array( 'slug' => 'label' ),
		));
	}
}

// on enregistre les types de posts, taxonomies
if ( function_exists('my_register_post_types') )
add_action( 'init', 'my_register_post_types' );

if ( function_exists('my_register_taxonomies') )
add_action( 'init', 'my_register_taxonomies' );

// on déclare les connexions entre différents types de posts
if ( function_exists('my_connection_types') )
add_action( 'p2p_init', 'my_connection_types' );
