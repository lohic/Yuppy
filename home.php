<?php get_header(); ?>

<!-- HOME.PHP -->

<!--
<div class="jumbotron">
	<div class="container">
		<h1>Hello, world!</h1>
		<p>...</p>
		<p><a class="btn btn-primary btn-lg" role="button">Learn more</a></p>
	</div>
</div>
-->

<?php 

get_template_part('bootstrap','carousel')

?>


<div class="row">
	<div class="col-6 col-sm-6 col-lg-4">
		<h2>Yuppy Yap</h2>
		<!-- yuppy-yap -->
		<?php $query = new WP_Query( array( 'category_name' => 'interviews', 'posts_per_page'=>1 ) );

		if($query->have_posts()) :
			while($query->have_posts()) : $query->the_post();?>
		<div class="yuppyyap-bloc">
			<?php 
			if ( has_post_thumbnail() ) {
			?>
				<a href="<?php the_permalink();?>">
				<?php the_post_thumbnail( 'home', array('class'=>'img-responsive vignette') ); ?>
				</a>
			<?php } ?>
			<h3><?php the_title()?> &nbsp;&nbsp;<span class="fleche"> </span><span><a href="<?php the_permalink();?>"> <?php _e("Lire l'interview");?></a></span></h3>
			<p class="extrait"><a href="<?php the_permalink();?>">«&nbsp;<?php
			$my_excerpt = get_the_excerpt();
			if ( $my_excerpt != '' ) {
				// Some string manipulation performed
			}
			echo $my_excerpt; // Outputs the processed value to the page
			?>&nbsp;»</a></p>
		</div>
		<?php
			endwhile;
		endif;
		wp_reset_postdata();
		?>
	</div><!--/span-->


	<div class="col-6 col-sm-6 col-lg-4">
		<h2>What' Sound</h2>
		<?php $query = new WP_Query( array( 'category_name' => 'whats-sound', 'posts_per_page'=>5 ) );

		if($query->have_posts()) :
			while($query->have_posts()) : $query->the_post();?>
		<div class="whatsound-bloc">
			<?php 
			if ( has_post_thumbnail() ) {
			?>
				<a href="<?php the_permalink();?>">
				<?php the_post_thumbnail( 'mini', array('class'=>'img-responsive vignette') ); ?>
				</a>
			<?php } ?> 
			<h3><a href="<?php the_permalink(); ?>"><?php the_title()?></br><!--peut-on rendre le roll-over solidaire ?-->
			<?php echo custom_taxonomies_terms_links('&nbsp;/ ','album',false); ?></a></h3>
			<p><?php echo custom_taxonomies_terms_links('&nbsp;/ ','genre'); ?></p>
			<div class="clearfix"></div>
		</div>
		<?php
			endwhile;
		endif;
		wp_reset_postdata();
		?>
	</div><!--/span-->

	
	<div class="col-6 col-sm-6 col-lg-4">
		<h2>Yuppy Sounds</h2>
		<iframe class="iframe" width="100%" height="465" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https://soundcloud.com/beyuppy/sets/selection-jeudi&amp;auto_play=false&amp;auto_advance=true&amp;buying=false&amp;liking=false&amp;download=false&amp;sharing=false&amp;show_artwork=false&amp;show_comments=false&amp;show_playcount=false&amp;show_user=false&amp;hide_related=false&amp;visual=false&amp;start_track=0&amp;callback=true&amp;color=00b5ff">
      </iframe>
		<?php /*$query = new WP_Query( array( 'category_name' => 'yuppy-sounds', 'posts_per_page'=>3 ) );

		if($query->have_posts()) :
			while($query->have_posts()) : $query->the_post();?>
		<div class="yuppysound-bloc">
			<h3><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h3>
			<?php

			//the_excerpt()

			// pour corriger un probleme avec shopplugin ?
			$content = get_the_excerpt();
			$content = do_shortcode( $content );
			$content = wpautop($content);
			//$content = apply_filters('the_content', $content);
			//the_content();
			$content = str_replace(']]>', ']]&gt;', $content);

			echo $content;

			?>
		</div>
		<?php
			endwhile;
		endif;
		wp_reset_postdata();*/
		?>
	</div><!--/span-->
</div>


<!-- fin HOME.PHP -->

<?php get_footer(); ?>