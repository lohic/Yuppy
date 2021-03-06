<?php get_header(); ?>

<!-- ARCHIVE.PHP -->
<?php

	$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;


	/*if(is_category()) {
		$cat_ID = get_query_var('cat');
	
		$args = array(
			'child_of'      => $cat_ID,
			'parent'        => '',
			'orderby'       => 'id',
			'hierarchical'  => 1,
		);

		$listeCat[] = $cat_ID;

		$categories = get_categories($args);

		foreach($categories as $cat){
			$listeCat[] = $cat->cat_ID.',';
		}

		// http://codex.wordpress.org/Function_Reference/query_posts
		// http://wordpress.org/support/topic/display-post-of-child-category-only
		// http://codex.wordpress.org/Function_Reference/get_categories

		//global $wp_query;
		//$args = array_merge( $wp_query->query_vars, array( 'category__in' => $listeCat) );

		$the_query = new WP_Query(array( 'category__in' => $listeCat, 'paged' => $paged));
	}else{*/

		global $wp_query;
		$args = array(
			'paged' => $paged,
		);

		$args = array_merge( $wp_query->query_vars, $args  );

		$the_query = new WP_Query( $args );
	//}
		
		$cat_name = single_cat_title('',false);
        ?>

<div id="content" class="row">
	<!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<ul class="pager">
			<li class="previous"><?php posts_nav_link('','','&laquo; Entrées Précédentes') ?></li>
			<li class="next"><?php posts_nav_link('','Entrées Suivantes &raquo;','') ?></li>
		</ul>
	</div>-->

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

	<h1 class="page-header"><?php echo $cat_name; ?></h1>

	<?php
	$big = 999999999; // need an unlikely integer

	//<ul class="pagination pagination-lg">...</ul>

	/*echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $the_query->max_num_pages,
		'type' => 'list'
	) );*/

	// cf  http://www.ordinarycoder.com/paginate_links-class-ul-li-bootstrap/

	$pages = paginate_links( array(
            'base' 		=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' 	=> '?paged=%#%',
            'current' 	=> max( 1, get_query_var('paged') ),
            'total' 	=> $the_query->max_num_pages,
            'prev_next' => false,
            'type'  	=> 'array',
            'prev_next' => false,
			'prev_text' => __('«'),
			'next_text' => __('»'),
        ) );
        if( is_array( $pages ) ) {
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
            echo '<ul class="pagination">';
            foreach ( $pages as $page ) {
                    echo "<li>$page</li>";
            }
           echo '</ul>';
        }
	?>
	</div>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<?php if($the_query->have_posts()) : 

	$i = 0;
	?>
		<div class="row">
		<?php while($the_query->have_posts()) : $the_query->the_post(); ?>
			<div class="post col-lg-3 col-md-4 col-sm-4 col-xs-12" id="post-<?php the_ID(); ?>">
				<?php if ( has_post_thumbnail() )?><a href="<?php the_permalink(); ?>"><?php { the_post_thumbnail('home', array('class' => 'img-responsive'));?></a><?php } ?>
					<p class="postmetadata"><!--<?php the_time('j F Y') ?> par <?php the_author() ?> | Catégorie:--><?php the_category(', ') ?><!-- | <?php comments_popup_link('Pas de commentaires', '1 Commentaire', '% Commentaires'); ?>--><?php edit_post_link('&Eacute;diter l\'article', ' &rarr; ', ''); ?></p>
				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<!--<div class="post_content">
						<?php the_excerpt(); ?>
					</div>-->
			</div>


			<?php 
			 $i++;
		     if ($i%4 == 0){?>
				<div class="clearfix visible-lg"></div>
		     <?php }
		     else if ($i%3 == 0){?>
				<div class="clearfix visible-md sm"></div>
		     <?php }

			endwhile; ?>

		</div>
	<?php endif; ?>
	</div>
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<?php
	$big = 999999999; 
	$pages = paginate_links( array(
            'base' 		=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' 	=> '?paged=%#%',
            'current' 	=> max( 1, get_query_var('paged') ),
            'total' 	=> $the_query->max_num_pages,
            'prev_next' => false,
            'type'  	=> 'array',
            'prev_next' => false,
			'prev_text' => __('«'),
			'next_text' => __('»'),
        ) );
        if( is_array( $pages ) ) {
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
            echo '<ul class="pagination">';
            foreach ( $pages as $page ) {
                    echo "<li>$page</li>";
            }
           echo '</ul>';
        }
	?>
	</div>
</div>
<!-- end ARCHIVE.PHP -->

<?php get_footer(); ?>