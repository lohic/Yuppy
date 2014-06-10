<?php
/*
Template Name: Bookings
*/
?>

<?php get_header(); ?>

<!-- P-BOOKINGS.PHP -->


<div id="content" class="row">


	<?php if(have_posts()) : ?>
		<div class="records col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<?php while(have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<h1 class="page-header"><?php the_title(); ?></h1>				
					<div class="post_content">
						<?php the_content(); ?>
					</div>
			</div>
		<?php endwhile; ?>
		</div>


		<div class="records col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="row">
				<?php
				$custom_posts = new WP_Query('post_type=groupe&posts_per_page=-1');
				if ($custom_posts->have_posts() ):
					$i = 0;
				?>
				    <?php while ($custom_posts->have_posts()): $custom_posts->the_post(); ?>
				        <div class="records col-lg-4 col-md-4 col-sm-6 col-xs-6">
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
		<p>Désolé, rien de tel ici.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>
		<?php edit_post_link('Modifier cette page', '<p>', '</p>'); ?>
	<?php endif; ?>

</div>

<!-- end P-BOOKINGS.PHP -->

<?php get_footer(); ?>