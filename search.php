<?php get_header(); ?>
    <div class="content">
		<?php if(have_posts()) : 
            while(have_posts()) : the_post(); ?>
			<div <?php post_class('post-main'); ?>>
				<h1><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
				<div <?php post_class('post'); ?>>
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                    <?php the_excerpt(); ?>
				</div>
			</div>
		<?php endwhile; ?>
		<?php else : ?>
		<div <?php post_class('post-main'); ?>>
			<div <?php post_class('post'); ?>>
				<p id="kis"><?php _e( 'No results found', 'use-your-brains' ); ?><br /><br /><img class="kisya" src="<?php echo esc_url(get_template_directory_uri()) ?>/images/404.jpg" width="400" height="314" /></p>
			</div>
		</div>				
		<?php endif; ?>				
    </div>
	<?php get_sidebar(); ?>
    </div>
	<?php get_footer(); ?>