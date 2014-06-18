<!-- SEARCHFORM.PHP -->
<div id="nav_searchform" class="navbar-nav col-lg-3 col-sm-3 navbar-right">
	<form class="navbar-form hidden-sm " role="search" method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
		<div class="form-group">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Chercher" value="<?php the_search_query(); ?>" name="s" id="s">
				<span class="input-group-btn">
					<button type="submit" id="searchsubmit" class="btn btn-default"><span id="search-btn" class="glyphicon glyphicon-search"></span></button>
				</span>
			</div>
		</div>
	</form>
</div>
<!-- end SEARCHFORM.PHP -->