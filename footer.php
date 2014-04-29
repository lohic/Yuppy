<!-- FOOTER -->

	</div>
	

	<div class="col-xs-12 col-md-3">
	<?php get_sidebar(); ?>
	</div>
</div>

<div class="footer row">
	<div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
		Logo
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
				'menu'              => 'footer_menu'					
			)) ;
		}
		?>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		<p>Facebook Twitter Vimeo</p>
		<p>Copyright &#169; <?php print(date(Y)); ?> | Blog propulsé par <a href="http://wordpress.org/">WordPress</a></p>
	</div>
</div>

	</div>

</div><!-- fermeture div "container" -->

<?php wp_footer(); ?>


<!--<?php echo get_num_queries(); ?> requêtes. <?php timer_stop(1); ?> secondes.-->
</body>
</html>