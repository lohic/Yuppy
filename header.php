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


	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />


	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php wp_head(); ?>

</head>
<body class="custom-background">

<div class="header container">

	<div class="row">
		<div class="col-md-12">
			<h1>
				<a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/yuppy-transp.png" alt="YUPPY" width="217" height="107"/><span class="invisible"><?php bloginfo('name'); ?></span></a>
			</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<p class="lead"><?php bloginfo('description'); ?></p>
		</div>
	</div>
</div>
	
<div class="header container navigation">
	<?php get_template_part('menu');?>
</div>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-9">
	
<!-- end HEADER.php -->