<?php
/*
Template Name: Discographie
*/
?>

<?php get_header(); ?>

<!-- P-SOUNDS.PHP -->


<div id="content" class="row">

	<div class="record col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<iframe class="iframe" width="100%" height="465" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https://soundcloud.com/beyuppy&amp;auto_play=false&amp;auto_advance=true&amp;buying=true&amp;liking=true&amp;download=true&amp;sharing=true&amp;show_artwork=true&amp;show_comments=true&amp;show_playcount=true&amp;show_user=true&amp;hide_related=true&amp;visual=false&amp;start_track=0&amp;callback=true&amp;color=00b5ff">
		  </iframe>
	</div>

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


		<div class="record col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="row">
				<?php
				$custom_posts = new WP_Query('post_type=discographie&posts_per_page=-1');
				if ($custom_posts->have_posts() ):
				$i = 0;
				?>
				    <?php while ($custom_posts->have_posts()): $custom_posts->the_post(); ?>
				        <div class="record col-lg-4 col-md-4 col-sm-6 col-xs-6">
				        	<?php if ( has_post_thumbnail() )?><a href="<?php the_permalink(); ?>"><?php { the_post_thumbnail('home', array('class' => 'img-responsive'));?></a><?php } ?>
				            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				        </div>
				    <?php
				    $i++;
				     if ($i%3 == 0){?>
						<div class="clearfix visible-lg visible-md"></div>
				     <?php }
				     else if ($i%6 == 0){?>
						<div class="clearfix visible-sm visible-xs"></div>
				     <?php }

				    endwhile; ?>
				<?php endif; ?>
			</div>
		</div>


	<?php else : ?>
		<h2>Aucun résultat</h2>
		<p>Désolé, mais vous cherchez quelque chose qui ne se trouve pas ici .</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>
		<?php edit_post_link('Modifier cette page', '<p>', '</p>'); ?>
	<?php endif; ?>

</div>

<!-- end P-SOUNDS.PHP -->

<?php get_footer(); ?>