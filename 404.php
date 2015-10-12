<?php get_header(); ?>
    <div class="content">
        <div <?php post_class('post-main'); ?>>
            <div <?php post_class('post'); ?>>
		<p id="kis">Page not found :(<br><br><img class="kisya" src="<?php echo esc_url(get_template_directory_uri()) ?>/images/page.jpg" width="400" height="314" /></p><br>
            </div>
	</div>	
    </div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>