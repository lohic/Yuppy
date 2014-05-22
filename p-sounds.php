<?php
/*
Template Name: Sounds
*/
?>

<?php get_header(); ?>

<!-- P-SOUNDS.PHP -->


<div id="content" class="row">

	<div class="record col-lg-12 col-md-12 col-sm-12 col-xs-12">

	<?php if(have_posts()) : ?>
		<div class="record col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<?php while(have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<h1 class="page-header"><?php the_title(); ?></h1>				
					<div class="post_content">
						<?php the_content(); ?>
					</div>
			</div>
		<?php endwhile; ?>
		</div>
	<?php endif; ?>

		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<iframe class="iframe" width="100%" height="465" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https://soundcloud.com/beyuppy&amp;auto_play=false&amp;auto_advance=true&amp;buying=true&amp;liking=true&amp;download=true&amp;sharing=true&amp;show_artwork=true&amp;show_comments=true&amp;show_playcount=true&amp;show_user=true&amp;hide_related=true&amp;visual=false&amp;start_track=0&amp;callback=true&amp;color=00b5ff">
				 </iframe>
			</div>
		</div>
	</div>

</div>

<!-- end P-SOUNDS.PHP -->

<?php get_footer(); ?>