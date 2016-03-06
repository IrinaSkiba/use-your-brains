<?php get_header(); ?>
    <div class="content">
        <div <?php post_class('post-main'); ?>>
            <div <?php post_class('post'); ?>>
				<p id="kis"><?php _e( 'Page not found', 'use-your-brains' ); ?><br><br><img class="kitty" src="<?php echo esc_url(get_template_directory_uri()) ?>/images/page.jpg" width="400" height="314" /></p><br>
            </div>
		</div>	
    </div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>