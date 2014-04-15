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
		<?php $query = new WP_Query( array( 'category_name' => 'concerts', 'posts_per_page'=>1 ) );

		if($query->have_posts()) :
			while($query->have_posts()) : $query->the_post();?>
		<h3><?php the_title()?></h3>
		<?php the_excerpt()?>
		<p><a class="btn btn-default" href="<?php the_permalink(); ?>" role="button">Lire la suite »</a></p>
		<?php
			endwhile;
		endif;
		wp_reset_postdata();
		?>
	</div><!--/span-->
	<div class="col-6 col-sm-6 col-lg-4">
		<h2>What' Sound</h2>
		<?php $query = new WP_Query( array( 'category_name' => 'chronique', 'posts_per_page'=>5 ) );

		if($query->have_posts()) :
			while($query->have_posts()) : $query->the_post();?>
		<h3><?php the_title()?></h3>
		<?php the_excerpt()?>
		<p><a class="btn btn-default" href="<?php the_permalink(); ?>" role="button">Lire la suite »</a></p>
		<?php
			endwhile;
		endif;
		wp_reset_postdata();
		?>
	</div><!--/span-->
	<div class="col-6 col-sm-6 col-lg-4">
		<h2>Yuppy Sounds</h2>
		<?php $query = new WP_Query( array( 'category_name' => 'yuppy-sounds', 'posts_per_page'=>3 ) );

		if($query->have_posts()) :
			while($query->have_posts()) : $query->the_post();?>
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
		<?php
			endwhile;
		endif;
		wp_reset_postdata();
		?>
	</div><!--/span-->
</div>

<!--
<div id="content">
	<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<h1 class="page-header"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
					
					<p class="postmetadata"><?php the_time('j F Y') ?> par <?php the_author() ?> | Cat&eacute;gorie: <?php the_category(', ') ?> | <?php comments_popup_link('Pas de commentaires', '1 Commentaire', '% Commentaires'); ?> <?php edit_post_link('Editer', ' &#124; ', ''); ?></p>
					
					<div class="post_content">
						<?php the_content(); ?>
					</div>
			</div>
	<?php endwhile; ?>
	<div class="navigation">
		<?php posts_nav_link(' - ','page suivante','page pr&eacute;c&eacute;dente'); ?>
	</div>
	<?php else : ?>
		<h2>OAucun résultat</h2>
		<p>Désolé, mais vous cherchez quelque chose qui ne se trouve pas ici .</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>
	<?php endif; ?>
</div>
-->

<!-- fin HOME.PHP -->

<?php get_footer(); ?>