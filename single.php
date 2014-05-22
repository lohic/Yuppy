<?php get_header(); ?>

<!-- SINGLE.PHP -->

<div id="content" class="row">
	<div class="col-lg-9 col-md-11 col-sm-12 col-xs-12">
		
<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
				<h1 class="page-header"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
				
				<p class="postmetadata">
					<small><?php the_date() ?> à <?php the_time() ?> par <?php the_author() ?> | Cat&eacute;gorie : <?php the_category(', ') ?> | <?php the_tags() ?></small>
				</p>
				
				<div class="post_content">
					<?php the_content(); ?>
				</div>
		</div>

	<div class="comments-template">
	<?php comments_template(); ?>
	</div>
	
	<?php endwhile; ?>
	<?php else : ?>
			<p>Désolé, aucun article ne correspond à vos critères.</p>
<?php endif; ?>
	</div>
</div>

<!-- end SINGLE.PHP -->

<?php get_footer(); ?>