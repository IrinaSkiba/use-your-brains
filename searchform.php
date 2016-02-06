<form class="search-main" action="<?php esc_url( home_url( '/' ) ); ?>" method="get">
	<input class="search-text" type="text" name="s" id="s" value="<?php the_search_query(); ?>" />
	<button class="button1"><?php echo _x( 'go', 'use-your-brains' ); ?></button>
</form>