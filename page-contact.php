<?php get_header(); ?>

<!-- PAGE-CONTACT.PHP -->


<div id="content" class="row">
	<div class="col-lg-6 col-md-7 col-sm-12 col-xs-12">
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
		<p>Désolé, rien de tel ici.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>
		<?php edit_post_link('Modifier cette page', '<p>', '</p>'); ?>
	<?php endif; ?>
	</div>
    
	<div class="col-lg-6 col-md-5 col-sm-12 col-xs-12">
		<div class="form_content">
			<p><?php echo do_shortcode('[mc4wp_form]');?></p>
			<p><?php echo do_shortcode('[formidable id=2]');?></p>
		</div>
	</div>
</div>

<!-- end PAGE-CONTACT.PHP -->

<?php get_footer(); ?>