<?php get_header(); ?>

<!-- SINGLE-DISCOGRAPHIE.PHP -->

<div id="content" class="row">
<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

	<?php
if ( is_post_type_archive() ) {
    ?>
    <h1><?php post_type_archive_title(); ?></h1>
    <?php
}
?>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="row">
			<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
				<h1 class="page-header"><?php the_title(); ?></h1>
			</div>
		</div>

	<?php if( have_rows('caroussel') ): ?>

		<div id="carousel-page" class="carousel slide" data-ride="carousel" data-wrap="false">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<?php
				$i=0; 
				while( have_rows('caroussel') ): the_row();
					$image = get_sub_field('image');
					if( !empty($image['sizes']['carousel']) ){
				?>
				<li data-target="#carousel-page" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0){ echo 'active'; } ?>"></li>
				<?php
						$i ++;
					}
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

					if( !empty($image['sizes']['carousel']) ){
				?>
				<div class="item<?php if($i == 0){ echo ' active'; } ?>">
					<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
				</div>
				<?php
					$i ++;
					}
				endwhile; ?>
			</div>
		</div>

	<?php endif; ?>

	</div>



	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	
		<div class="post" id="post-<?php the_ID(); ?>">
				
				<!--<p class="postmetadata">
					<small><?php the_date() ?> à <?php the_time() ?> par <?php the_author() ?> | Cat&eacute;gorie : <?php the_category(', ') ?> | <?php the_tags() ?></small>
				</p>-->
				
				<div class="post_content">
					<p><?php the_excerpt(); ?></p>
					<?php if( has_post_thumbnail() ){ ?>
					<p><?php the_post_thumbnail('thumbnail');?></p>
					<?php } ?>
					<?php the_content(); ?>
				</div>
		</div>


		<div class="comments-template">
		<?php comments_template(); ?>
		</div>

	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

		<div>
			<?php 

				$discographie = p2p_type( 'discographie_to_artist' )->get_connected(get_the_ID());


				if ( $discographie->have_posts() ) {
				       
					while ( $discographie->have_posts() ) {
						$discographie->the_post();
						?>
						<h3>Artiste : <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<!--<div class='discographie'>
							<?php if ( has_post_thumbnail() ) {  ?><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a><?php } ?>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						</div>-->
						<?php
					}
			
				} 
			?>
		</div>
	</div>
	
	<?php endwhile; ?>
	<?php else : ?>
			<p>Désolé, aucun article ne correspond à vos critères.</p>
<?php endif; ?>
</div>

<!-- end SINGLE-DISCOGRAPHIE.PHP -->

<?php get_footer(); ?>