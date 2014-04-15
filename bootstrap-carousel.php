<!-- bootsrap-carousel.php -->
<?php

/* Get all Sticky Posts */
$sticky = get_option( 'sticky_posts' );
/* Sort Sticky Posts, newest at the top */
rsort( $sticky );
/* Get top 5 Sticky Posts */
$sticky = array_slice( $sticky, 0, 5 );
/* Query Sticky Posts */
$sticky_query = new WP_Query( array( 'post__in' => $sticky, 'ignore_sticky_posts' => 1 ) );

if($sticky_query->have_posts() && count($sticky)>0) : ?>

<div id="carousel-home" class="carousel slide" data-ride="carousel" data-wrap="false">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<?php $i=0; 
		while($sticky_query->have_posts()) : $sticky_query->the_post();
		if(has_post_thumbnail()) :?>
		<li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0){ echo 'active'; } ?>"></li>
		<?php
		$i ++;
		endif;
		endwhile; ?>
	</ol>
	<div class="carousel-inner">
		<?php $i=0; 
		while($sticky_query->have_posts()) : $sticky_query->the_post();
		if(has_post_thumbnail()) :?>
		<div class="item<?php if($i == 0){ echo ' active'; } ?>">
			<?php the_post_thumbnail( 'medium' ); ?> 
			<div class="container">
				<div class="carousel-caption">
					<h1><?php the_title(); ?></h1>
					<p><a class="btn btn-lg btn-primary" href="<?php the_permalink(); ?>" role="button">Lire la suite</a></p>
				</div>
			</div>
		</div>
		<?php
		$i ++;
		endif;
		endwhile; ?>
	</div>
	<a class="left carousel-control" href="#carousel-home" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
	<a class="right carousel-control" href="#carousel-home" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>
<?php endif;
wp_reset_postdata(); ?>
<!-- FIN DE bootsrap-carousel.php -->