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


	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?v=1.0.9" type="text/css" media="screen" />

	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />


	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php wp_head(); ?>

	<?php if(have_rows('backgrounds', 'option')) : ?>
	<style type="text/css" id="custom-background-image-css">
	<?php 

	$img_fond 		= array();
	$bg_repeat	  	= array();
	$bg_attachment	= array();
	$bg_size	  	= array();

	while( have_rows('backgrounds','option') ): the_row();
		$img_fond[]		 = get_sub_field('image');
		$bg_repeat[]	 = get_sub_field('repeat');
		$bg_attachment[] = get_sub_field('attachment');
		$bg_size[]		 = get_sub_field('size');
	endwhile;
	

	$refBG 		= array_rand($img_fond);
	$url 		= $img_fond[$refBG];
	$repeat 	= $bg_repeat[$refBG];
	$attachment = $bg_attachment[$refBG];
	$size		= $bg_size[$refBG];

	echo "body.custom-background{
		background-image:url($url);
		background-repeat: $repeat;
		background-attachment: $attachment;
		background-size: $size;
	}";

    ?>
    </style>
	<?php endif; ?>

</head>
<body class="custom-background">

<div class="header container">

	<div class="row">
		<div class="col-sm-4 col-sm-push-8 col-xs-12" id="col-lang">

			<div class="langues-newsletter pull-right">
				<button class="btn btn-default btn-newsletter" data-toggle="modal" data-target="#mailchimp">S'inscrire à la newsletter</button>
			<?php
				languages_list();
				function languages_list(){
				    $languages = icl_get_languages('skip_missing=0&orderby=code');
				    if(!empty($languages)){
				        foreach($languages as $l){
				            echo ' <span>';
				            if(!$l['active']) echo '<a href="'.$l['url'].'">';
				            echo substr(icl_disp_language( $l['native_name'] ),0,2);
				            if(!$l['active']) echo '</a>';
				            echo '</span>';
				        }
				    }
				}
			?>
			</div>
			
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

		</div>
		<div class="col-sm-8 col-sm-pull-4 col-xs-12">
			<div class="row">
				<div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
					<h1>
						<a href="<?php echo icl_get_home_url(); //bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/yuppy-transp.png" alt="YUPPY" width="217" height="107"/><span class="invisible"><?php bloginfo('name'); ?></span></a>
					</h1>
				</div>
				<div class="col-lg-8 col-md-7 col-sm-6 col-xs-12">
					<p class="lead"><?php bloginfo('description'); ?></p>
				</div>
			</div>
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