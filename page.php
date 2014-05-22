<?php get_header(); ?>

<!-- PAGE.PHP -->


<div id="content" class="row">
	<div class="col-lg-9 col-md-11 col-sm-12 col-xs-12">
	<?php if(have_posts()) : ?>
		<?php while(have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<h1 class="page-header"><?php the_title(); ?></h1>				
					<div class="post_content">
						<?php the_content(); ?>
					</div>
			</div>

		<?php endwhile; ?>
	<?php else : ?>
		<h2>Aucun résultat</h2>
		<p>Désolé, mais vous cherchez quelque chose qui ne se trouve pas ici .</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>
		<?php edit_post_link('Modifier cette page', '<p>', '</p>'); ?>
	<?php endif; ?>
	</div>
</div>

<!-- end PAGE.PHP -->

<?php get_footer(); ?>