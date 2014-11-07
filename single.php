<?php get_header(); ?>

<!-- SINGLE.PHP -->

<div id="content" class="row">
	<div class="col-lg-9 col-md-11 col-sm-12 col-xs-12">
		
<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
				<h1 class="page-header"><?php the_title(); ?></h1>

				<p class="postmetadata-single"><?php the_category(', ') ?></p>
				<p class="postmetadata-single"><?php the_date() ?><br/><span class="tags"><?php the_tags() ?></span></p>

				<div class="post_content">
					<?php the_content(); ?>


					<?php

						$isAlbum = false;
						$isLabel = false;  

						$terms = get_the_terms( $post->ID, 'album' );

												
						if ( $terms && ! is_wp_error( $terms ) ) :

							echo '<p>';

							$albums_links = array();

							foreach ( $terms as $term ) {
								$albums_links[] = $term->name;

								$isAlbum = true;
							}
												
							$albums = join( ", ", $albums_links );

						 	echo 'Album : ' . $albums ; 

						endif; 


						$terms = get_the_terms( $post->ID, 'label' );
												
						if ( $terms && ! is_wp_error( $terms ) ) : 

							echo $isAlbum==true ? '<br/>' : '<p>';

							$labels_links = array();

							foreach ( $terms as $term ) {
								$labels_links[] = $term->name;

								$isLabel = true;
							}
												
							$labels = join( ", ", $labels_links );

						 	echo 'Label : ' . $labels . '</p>';

						endif;

						if($isAlbum && !$isLabel){
							echo '</p>';
						}

					?>

				</div>
		</div>

	<div class="comments-template">
	<?php comments_template(); ?>
	</div>
	
	<?php endwhile; ?>
	<?php else : ?>
			<p>Désolé, rien de tel ici.</p>
<?php endif; ?>
	</div>
</div>

<!-- end SINGLE.PHP -->

<?php get_footer(); ?>