<?php get_header(); ?>
    <div class="content">
	<?php if(have_posts()) : 
            while(have_posts()) : the_post(); ?>
            <?php get_template_part('content', 'page'); ?>

	<?php
	// If comments are open or we have at least one comment, load up the comment template
	if (comments_open() || '0' != get_comments_number()) :
            comments_template();
	endif;
	?>
		
	<div <?php post_class('post-main'); ?>>
            <h1><?php the_title(); ?></h1>
		<div <?php post_class('post'); ?>>
                    <?php the_content(); ?>
					<?php wp_link_pages();?>
		</div>
	</div>
            <?php endwhile; ?>
						
            <?php endif; ?>
						
    </div>
	<?php get_sidebar(); ?>
</div>
	<?php get_footer(); ?>