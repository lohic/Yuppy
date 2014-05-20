<?php get_header(); ?>

<!-- SINGLE-GROUPE.PHP -->

<div id="content" class="row">
<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

	<?php
if ( is_post_type_archive() ) {
    ?>
    <h1><?php post_type_archive_title(); ?></h1>
    <?php
}
?>

	<?php if( have_rows('caroussel') ): ?>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">	
		
		<div id="carousel-home" class="carousel slide" data-ride="carousel" data-wrap="false">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<?php
				$i=0; 
				while( have_rows('caroussel') ): the_row();
					//$image = get_sub_field('image');
				?>
				<li data-target="#carousel-home" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0){ echo 'active'; } ?>"></li>
				<?php
				$i ++;
				endwhile; ?>
			</ol>
			<div class="carousel-inner">
				<?php
				$i=0; 
				while( have_rows('caroussel') ): the_row();
					$image  = get_sub_field('image');

					$alt    = $image['alt'];

					$size   = 'carousel';
					$thumb  = $image['sizes'][ $size ];
					$width  = $image['sizes'][ $size . '-width' ];
					$height = $image['sizes'][ $size . '-height' ];
				?>
				<div class="item<?php if($i == 0){ echo ' active'; } ?>">
					<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
				</div>
				<?php
				$i ++;
				endwhile; ?>
			</div>
		</div>


	</div>

	<?php endif; ?>


	<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
	
		<div class="post" id="post-<?php the_ID(); ?>">
				<h1 class="page-header"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
				
				<!--<p class="postmetadata">
					<small><?php the_date() ?> à <?php the_time() ?> par <?php the_author() ?> | Cat&eacute;gorie : <?php the_category(', ') ?> | <?php the_tags() ?></small>
				</p>-->
				
				<div class="post_content">
					<?php the_content(); ?>
				</div>
		</div>


		<div class="comments-template">
		<?php comments_template(); ?>
		</div>

	</div>
	
	
	<?php endwhile; ?>
	<?php else : ?>
			<p>Désolé, aucun article ne correspond à vos critères.</p>
<?php endif; ?>
</div>

<!-- end SINGLE-GROUPE.PHP -->

<?php get_footer(); ?>