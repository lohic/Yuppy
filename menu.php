<!-- MENU.PHP -->
<!-- navbar-inverse -->
<nav class="navbar navbar-default" role="navigation">
	<!--<div class="container-fluid">-->
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<!--<a class="navbar-brand" href="#"><?php bloginfo('name') ?></a>-->
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<?php
		if ( has_nav_menu( 'main_menu' ) ) {
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
				'menu'              => 'main_menu',
				'depth'             => 2,
				'container'         => false,
				'menu_class'        => 'nav navbar-nav',
				'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
				'walker'            => new wp_bootstrap_navwalker())								
			) ;
		}
		?>
	
		<?php get_template_part('searchform','nav') ?>
		</div>
	<!--</div>-->
</nav>

<!-- WPML -->
<?php //do_action('icl_language_selector'); ?>
<!-- end MENU.PHP -->