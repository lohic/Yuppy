<?php

if(is_file(dirname(__File__) . '/acf/fields.php') && site_url() != 'http://localhost:8888/Site_YUPPY'){
	define( 'ACF_LITE', true );
	//include(dirname(__File__) . '/acf/fields.php');
	get_template_part('/acf/fields');
}

add_theme_support( 'post-thumbnails' );

add_image_size( 'mini', 80, 80, true ); 
//add_image_size( 'home', 280, 175, true ); 
add_image_size( 'home', 320, 200, true ); 
//add_image_size( 'medium', 400, 9999, false ); 

add_image_size( 'carousel', 900, 405, true );


// https://github.com/twittem/wp-bootstrap-navwalker
require_once('inc/wp_bootstrap_navwalker.php');
require_once('inc/bottom_navwalker.php');

if ( function_exists('register_sidebar') )
register_sidebar(
	array(
		'name'=>'Sidebar',
		'before_widget' => '<div id="%1$s" class="widget col-12 col-md-12 col-sm-4 col-xs-12 %2$s">',
		'after_widget'  => "</div>\n"
	)
);

if ( function_exists('register_nav_menus') )
register_nav_menus(
	array(
		'main_menu'		=> __('Menu principal'),
		'footer_menu'	=> __('Menu pied de page')
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
			'name' 			=> 'discographie_to_artist',
			'from' 			=> 'artist',
			'to' 			=> 'discographie',
			'reciprocal' 	=> true,
			//'title' 		=> 'Albums',
			'title' 		=> array( 'from' => 'Discographies', 'to' => 'Artiste' ),
			'cardinality' 	=> 'one-to-many',
		) );
	}
}


if( ! function_exists (my_register_post_types)) {
	function my_register_post_types() {


		register_post_type(
			'artist',
			array(
				'label' 			=> __('Artistes'),
				'singular_label'  	=> __('Artiste'),
				'public' 			=> true,
				'show_ui' 			=> true,
				//'show_in_menu' 	=> false,
				//'menu_icon'		=> get_bloginfo('template_directory') .'/images/favicon.png',
				'menu_icon'			=> 'dashicons-universal-access-alt',
				'show_in_nav_menus'	=> false,
				'capability_type' 	=> 'page',
				'rewrite' 			=> array("slug" => "artists"),
				'hierarchical' 		=> false,
				'query_var' 		=> false,
				'supports' 			=> array('title','editor','thumbnail'),
				'menu_position' 	=> 20,
				//'taxonomies' => 
			)
		);	


		register_post_type(
			'discographie',
			array(
				'label' 			=> __('Discographies'),
				'singular_label' 	=> __('Discographie'),
				'public' 			=> true,
				'show_ui' 			=> true,
				//'show_in_menu' 	=> false,
				//'menu_icon'		=> get_bloginfo('template_directory') .'/images/favicon.png',
				'menu_icon'			=> 'dashicons-format-audio',
				'show_in_nav_menus' => false,
				'capability_type'   => 'post',
				'rewrite' 			=> array("slug" => "discographie"),
				'hierarchical' 		=> false,
				'query_var' 		=> false,
				'supports' 			=> array('title','editor','excerpt','thumbnail'),
				'menu_position' 	=> 21,
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
				'menu_icon'			=> 'dashicons-universal-access',
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
	
		register_taxonomy('genre',array('post', 'discographie'),array(
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



/**
 * wp_enqueue_scripts action hook to link only on the front-end
 * @return [type] [description]
 */
function my_scripts_method() {
    wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap',      get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.1.1', true );
	wp_enqueue_script( 'yuppy',     	 get_template_directory_uri() . '/js/script.js', array('jquery','bootstrap'),'1.0.1', true );
}

add_action( 'wp_enqueue_scripts', 'my_scripts_method' ); 

add_editor_style( 'css/editor-style.css' );
/**
 * get taxonomies terms links
 * @param  string $glue      [description]
 * @param  [type] $taxonomie [description]
 * @return [type]            [description]
 */
function custom_taxonomies_terms_links($glue = ', ',$taxonomie = null, $link=true){
	// get post by post id
	$post = get_post( $post->ID );

	// get post type by post
	$post_type = $post->post_type;

	// get post type taxonomies
	$taxonomies = get_object_taxonomies( $post_type, 'objects' );

	$out = array();
	if(empty($taxonomie)){
		foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){

			// get the terms related to post
			$terms = get_the_terms( $post->ID, $taxonomy_slug );

			if ( !empty( $terms ) ) {
				//$out[] = "<h2>" . $taxonomy->label . "</h2>\n<ul>";
				foreach ( $terms as $term ) {
					if($link){
						$out[] =
						'<a href="'
						.get_term_link( $term->slug, $taxonomy_slug ) .'">'
						.$term->name
						."</a>";
					}else{
						$out[] = $term->name;
					}
				}
				//$out[] = "</ul>\n";
			}
		}
	}else{
		$terms = get_the_terms( $post->ID, $taxonomie );

		if ( !empty( $terms ) ) {
			//$out[] = "<h2>" . $taxonomy->label . "</h2>\n<ul>";
			foreach ( $terms as $term ) {
				if($link){
					$out[] =
					'<a href="'
					.get_term_link( $term->slug, $taxonomie ) .'">'
					.$term->name
					."</a>";
				}else{
					$out[] = $term->name;
				}
			}
			//$out[] = "</ul>\n";
		}
	}

	return implode($glue, $out );
}



/**
 * BREADCRUMB
 * @return [type] [description]
 */
function dimox_breadcrumbs() {

	$showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$delimiter = '<span class="divider"></span>'; // delimiter between crumbs
	$home = 'Accueil'; // text for the 'Home' link
	$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
	$before = '<li class="active"><span class="current">'; // tag before the current crumb
	$after = '</span></li>'; // tag after the current crumb

	global $post;
	$homeLink = get_bloginfo('url');

	if (is_home() || is_front_page()) {

		if ($showOnHome == 1) echo '<ul class="breadcrumb"><li><a href="' . $homeLink . '">' . $home . '</a></li></ul>';

	} else {

		echo '<ol class="breadcrumb"><li><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . '</li> ';

		if ( is_category() ) {
			$thisCat = get_category(get_query_var('cat'), false);
			if ($thisCat->parent != 0) echo '<li>'.get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ').'</li>';
			echo $before . '' . single_cat_title('', false) . '' . $after;

		} elseif ( is_search() ) {
			echo $before . 'Search results for "' . get_search_query() . '"' . $after;

		} elseif ( is_day() ) {
			echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . '</li> ';
			echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . '</li> ';
			echo $before . get_the_time('d') . $after;

		} elseif ( is_month() ) {
			echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . '</li> ';
			echo $before . get_the_time('F') . $after;

		} elseif ( is_year() ) {
			echo $before . get_the_time('Y') . $after;

		} elseif ( is_single() && !is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
				if ($showCurrent == 1) echo ' ' . $delimiter . '</li> ' . $before . get_the_title() . $after;
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				$cats = '<li>'.get_category_parents($cat, TRUE, ' ' . $delimiter . '</li><li> ').'</li>';
				if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
				echo str_replace('<li> </li>','',$cats);
				if ($showCurrent == 1) echo $before . get_the_title() . $after;
			}

		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;

		} elseif ( is_attachment() ) {
			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			echo get_category_parents($cat, TRUE, ' ' . $delimiter . '</li> ');
			echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
			if ($showCurrent == 1) echo ' ' . $delimiter . '</li> ' . $before . get_the_title() . $after;

		} elseif ( is_page() && !$post->post_parent ) {
			if ($showCurrent == 1) echo $before . get_the_title() . $after;

		} elseif ( is_page() && $post->post_parent ) {
			$parent_id = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
				$parent_id = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			for ($i = 0; $i < count($breadcrumbs); $i++) {
				echo $breadcrumbs[$i];
				if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . '</li> ';
			}
			if ($showCurrent == 1) echo ' ' . $delimiter . '</li> ' . $before . get_the_title() . $after;

		} elseif ( is_tag() ) {
			echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;

		} elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata($author);
			echo $before . 'Articles posted by ' . $userdata->display_name . $after;

		} elseif ( is_404() ) {
			echo $before . 'Error 404' . $after;
		}

		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
			echo __('Page') . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}

		echo '</ol>';

	}
} // end dimox_breadcrumbs()



/**
 * Galerie au format carousel 
 * cf http://tiffanybbrown.com/2013/02/03/wordpress-adding-custom-galleries-to-your-theme/
 * @param  [type] $attr [description]
 * @return [type]       [description]
 */

remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'custom_gallery');

function custom_gallery($attr) {
	$post = get_post();
 
	static $instance = 0;
	$instance++;
 
	# hard-coding these values so that they can't be broken
	
	$attr['columns'] = 1;
	$attr['size'] = 'full';
	$attr['link'] = 'none';
 
	$attr['orderby'] = 'post__in';
	$attr['include'] = $attr['ids'];		
 
	#Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);
	
	if ( $output != '' )
		return $output;
 
	# We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}
 
	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'div',
		'icontag'    => 'div',
		'captiontag' => 'p',
		'columns'    => 1,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => ''
	), $attr));
 
	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';
 
	if ( !empty($include) ) {
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}
 
	if ( empty($attachments) )
		return '';
 
	$gallery_style = $gallery_div = '';
 
	if ( apply_filters( 'use_default_gallery_style', true ) )
		$gallery_style = "<!-- see gallery_shortcode() in functions.php -->";
	
	$gallery_div = '<div id="carousel-'.$instance.'" class="carousel slide" data-ride="carousel" data-wrap="false">';
	


	$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

	$i = 0;
	$output .= '<ol class="carousel-indicators">';
	foreach ( $attachments as $id => $attachment ) {
		$target = wp_get_attachment_image_src( $id, 'large' );
		$thumb  = wp_get_attachment_image_src( $id, 'large' );
		$legende ='';

		$output .= '<li data-target="#carousel-'.$instance.'" data-slide-to="'.$i.'" class="'.( ($i == 0)? 'active': '') .'"></li>';

		$i++;
	}
	$output .= '</ol>'."\n";	

	$i = 0;
	$output .= '<div class="carousel-inner">'."\n";
	foreach ( $attachments as $id => $attachment ) {


		$image = wp_get_attachment_image_src( $id, 'carousel' );
		$legende ='';

		//$legende = get_the_title($id);
		//$legende = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
		$legende = addslashes(wptexturize($attachment->post_excerpt));

	
		//$link = wp_get_attachment_link($id, $imageSize , false, false);


		$output .= '<div class="item'.( ($i == 0) ? ' active' : '' ).'">
			<img src="'.$image[0].'" width="'.$image[1].'" height="'.$image[2].'" />
			<!--<div class="container">
				<div class="carousel-caption">
					<div class="carousel-caption-container">
						<h1><a href="#url">Titre</a></h1>
						<p class="visible-lg visible-md hidden-sm hidden-xs"><a href="#url"><span class="fleche"></span> Lire la suite</a></p>
					</div>
				</div>
			</div>-->
		</div>';

		/*if ( $captiontag && trim($attachment->post_excerpt) ) {
			$output .= "
				<p class='wp-caption-text homepage-gallery-caption'>
				" . wptexturize($attachment->post_excerpt) . "
				</p>";
		}*/
		//$output .= "</div>";

		$i++;
	}
	$output .= '</div>'."\n";
	$output .= '</div>'."\n";
 
	return $output;
}



// [aside] [/aside]
/**
 * [aside_shortcode description]
 * @param  [type] $atts    [description]
 * @param  [type] $content [description]
 * @return [type]          [description]
 */
function aside_shortcode( $atts, $content = "" ) {
	extract( shortcode_atts( array(
		'align' => 'right',
	), $atts ) );
	return '<aside class="'.$align.'">' . $content . '</aside>';
}
add_shortcode( 'aside', 'aside_shortcode' );



/******************************************************************************
* @Author: Boutros AbiChedid 
* @Date:   June 20, 2011
* @Websites: http://bacsoftwareconsulting.com/ ; http://blueoliveonline.com/
* @Description: Preserves HTML formating to the automatically generated Excerpt.
* Also Code modifies the default excerpt_length and excerpt_more filters.
* @Tested: Up to WordPress version 3.1.3
*******************************************************************************/
function custom_wp_trim_excerpt($text) {
$raw_excerpt = $text;
if ( '' == $text ) {
    //Retrieve the post content. 
    $text = get_the_content('');
 
    //Delete all shortcode tags from the content. 
    $text = strip_shortcodes( $text );
 
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
     
    $allowed_tags = '<a><br><p><em><strong>'; /*** MODIFY THIS. Add the allowed HTML tags separated by a comma.***/
    $text = strip_tags($text, $allowed_tags);
     
    $excerpt_word_count = 55; /*** MODIFY THIS. change the excerpt word count to any integer you like.***/
    $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count); 
     
    $excerpt_end = '[...]'; /*** MODIFY THIS. change the excerpt endind to something else.***/
    $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);
     
    $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
    if ( count($words) > $excerpt_length ) {
        array_pop($words);
        $text = implode(' ', $words);
        $text = $text . $excerpt_more;
    } else {
        $text = implode(' ', $words);
    }
}
return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'custom_wp_trim_excerpt');
