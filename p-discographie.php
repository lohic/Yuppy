<?php
/*
Template Name: Discographie
*/
?>

<?php get_header(); ?>

<!-- P-DISCOGRAPHIE.PHP -->


<div id="content" class="row">

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
				        <div class="post discographie col-lg-3 col-md-4 col-sm-4 col-xs-6">

				        	<?php $disque = get_post(get_the_ID());?>

				        	<?php if ( has_post_thumbnail() )?><a href="<?php echo get_permalink( $disque->ID ); ?>"><?php { the_post_thumbnail('thumbnail', array('class' => 'img-responsive'));?></a><?php } ?>
				        	<p class="postmetadata"><?php 
				        		$discographie = p2p_type( 'discographie_to_record' )->set_direction( 'to' )->get_connected(get_the_ID());
				        		if ( $discographie->have_posts() ) {
				       
									while ( $discographie->have_posts() ) {
										$discographie->the_post();
										?><a href="<?php the_permalink(); ?>"><?php the_title();?></a><?php 
									}
							
								} 


				        	 ?><?php edit_post_link('&Eacute;diter l\'album', ' &rarr; ', ''); ?></p>
				            <h2><a href="<?php echo get_permalink( $disque->ID ); ?>"><?php echo $disque->post_title; ?></a></h2>
				        </div>
				    <?php
				    $i++;
				     if ($i%3 == 0){?>
						<div class="clearfix visible-md visible-sm"></div>
				     <?php }
				     else if ($i%4 == 0){?>
						<div class="clearfix visible-lg"></div>
				     <?php }
				     else if ($i%6 == 0){?>
						<div class="clearfix visible-xs"></div>
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

<!-- end P-DISCOGRAPHIE.PHP -->

<?php get_footer(); ?>