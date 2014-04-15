<!-- SEARCHFORM.PHP -->
<form role="search" method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
	<div class="form-group">
		<div class="input-group">
			<input type="text" class="form-control" placeholder="Chercher" value="<?php the_search_query(); ?>" name="s" id="s">
			<span class="input-group-btn">
				<button type="submit" id="searchsubmit" class="btn btn-default">Ok</button>
			</span>
		</div>
	</div>
</form>
<!-- end SEARCHFORM.PHP -->