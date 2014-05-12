<?php get_header(); ?>

<!-- ARCHIVE.PHP -->
		
<?php

	if(is_category()) {
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

		//global $wp_query;
		//$args = array_merge( $wp_query->query_vars, array( 'category__in' => $listeCat) );

		query_posts(array( 'category__in' => $listeCat));
	}
		
?>


<div id="content" class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<ul class="pager">
			<li class="previous"><?php posts_nav_link('','','&laquo; Entrées Précédentes') ?></li>
			<li class="next"><?php posts_nav_link('','Entrées Suivantes &raquo;','') ?></li>
		</ul>
	</div>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<?php if(have_posts()) : ?>


				
		<?php while(have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				
				<p class="postmetadata"><?php the_time('j F Y') ?> par <?php the_author() ?> | Catégorie: <?php the_category(', ') ?> | <?php comments_popup_link('Pas de commentaires', '1 Commentaire', '% Commentaires'); ?> <?php edit_post_link('Editer', ' &#124; ', ''); ?></p>
				
				<div class="post_content">
					<?php the_excerpt(); ?>
				</div>
		</div>

		<?php endwhile; ?>
	<?php endif; ?>
	</div>
</div>

<!-- end ARCHIVE.PHP -->

<?php get_footer(); ?>