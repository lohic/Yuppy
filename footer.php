<!-- FOOTER -->

		</div><!-- .col -->
		

		<div class="col-xs-12 col-md-3">
		<?php get_sidebar(); ?>
		</div>
	</div><!-- .row -->
</div><!-- .container -->


<div class="container">
	<div class="footer row">
		<div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
			<a href="<?php echo icl_get_home_url();  //bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/yuppy-transp.png" alt="YUPPY" width="125" height="62"/><span class="invisible"><?php bloginfo('name'); ?></span></a>
		</div>
		<div class="col-lg-7 col-md-6 col-sm-6 col-xs-12">
			<?php
			if ( has_nav_menu( 'footer_menu' ) ) {
				/*wp_nav_menu( array(
					'menu'		 => 'main_menu',
					'container'	 => false,
					'menu_class' => 'nav navbar-nav',
					'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				) );*/

				/*wp_nav_menu( array( 
					'menu'              => 'main_menu',
					'depth'             => 2,
					'container'         => 'div',
					'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
					'menu_class'        => 'nav navbar-nav',
					'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
					'walker'            => new wp_bootstrap_navwalker())								
				) ;*/

				wp_nav_menu( array( 
					'theme_location'              => 'footer_menu'					
				)) ;
			}
			?>
			
		</div>
	
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<ul class="social">
				<li><a href="https://www.facebook.com/BEYUPPY" class="icon facebook" target="_blank">facebook</a></li>
				<li><a href="https://twitter.com/BEYUPPY" class="icon twitter" target="_blank">twitter</a></li>
				<li><a href="https://http://vimeo.com/yuppy" class="icon vimeo" target="_blank">vimeo</a></li>
				<li><a href="https://soundcloud.com/beyuppy" class="icon soundcloud" target="_blank">soundcloud</a></li>
			</ul>
			<p>&#169; <?php print(date(Y)); ?> <a href="<?php  echo icl_get_home_url(); ?>">YUPPY</a> — All rights reserved.</p>
		</div>
	</div>
</div><!-- fermeture div "container" -->


<?php wp_footer(); ?>


<!--<?php echo get_num_queries(); ?> requêtes. <?php timer_stop(1); ?> secondes.-->
</body>
</html>