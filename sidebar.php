
<?php if( !is_page('contact') ){ ?>
<div class="row sidebar">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?> 

	<?php endif; ?>
</div>
<?php } ?>