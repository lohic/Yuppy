<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php bloginfo('name') ?><?php if ( is_404() ) : ?> &raquo; <?php _e('Not Found') ?><?php elseif ( is_home() ) : ?> &raquo; <?php bloginfo('description') ?><?php else : ?><?php wp_title() ?><?php endif ?></title>
	 
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />

	<script type="text/javascript" src="//use.typekit.net/yzo0tno.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/bootstrap.min.css">

	<!-- Optional theme -->
	<!--<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/bootstrap-theme.min.css">-->


	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?v=1.0.5" type="text/css" media="screen" />

	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />


	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php wp_head(); ?>

</head>
<body class="custom-background">

<div class="header container">

	<div class="row">
		<div class="col-md-4 col-md-push-8 col-sm-12">

			<button class="btn btn-default pull-right btn-newsletter" data-toggle="modal" data-target="#mailchimp">S'inscrire à la newsletter</button>
			<!-- fenetre modale -->
			<div id="mailchimp" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-body">
							<?php echo do_shortcode('[mc4wp_form]');?>
						</div>
					</div>
				</div>
			</div>
			<!-- fin fenetre modale -->

			<div class="langues">
			<?php
				languages_list();
				function languages_list(){
				    $languages = icl_get_languages('skip_missing=0&orderby=code');
				    if(!empty($languages)){
				        foreach($languages as $l){
				            echo ' <span>&nbsp;&nbsp;';
				            if(!$l['active']) echo '<a href="'.$l['url'].'">';
				            echo substr(icl_disp_language( $l['native_name'] ),0,2);
				            if(!$l['active']) echo '</a>';
				            echo '</span>';
				        }
				    }
				}
			?>
			</div>
		</div>
		<div class="col-md-8 col-md-pull-4 col-sm-12">
			<h1>
				<a href="<?php echo icl_get_home_url(); //bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/yuppy-transp.png" alt="YUPPY" width="217" height="107"/><span class="invisible"><?php bloginfo('name'); ?></span></a>
			</h1>
			<p class="lead"><?php bloginfo('description'); ?></p>
			<div class="clear"></div>
		</div>
	</div>

</div>
	
<div class="header container navigation">
	<?php get_template_part('menu');?>
</div>

<div class="container">
	<div class="row">
		<?php if( !is_page('contact') ){ ?>
		<div class="col-xs-12 col-md-9">
		<?php }else{ ?>
		<div class="col-xs-12">
		<?php }?>
			<!-- breadcrumb -->
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<?php dimox_breadcrumbs(); ?>
				</div>
			</div>
	
<!-- end HEADER.php -->