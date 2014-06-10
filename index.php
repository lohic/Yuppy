<?php get_header(); ?>

<!-- INDEX.PHP -->


<div id="content" class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
		<h2>Aucun résultat</h2>
		<p>Désolé, rien de tel ici.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>
	<?php endif; ?>
	</div>
</div>

<!-- fin INDEX.PHP -->

<?php get_footer(); ?>