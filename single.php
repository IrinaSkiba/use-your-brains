<?php get_header(); ?>
    <div class="content">
	<?php if(have_posts()) : 
	while(have_posts()) : the_post(); ?>
            <div <?php post_class('post-main'); ?>>
		<h1><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
		<div <?php post_class('post'); ?>>
		<?php the_content(); ?><hr/>
		<?php wp_link_pages();?>
		<?php comments_template(); ?>
		</div>
            </div>
            <?php endwhile; ?>
						
	<div class="nav">
            <?php previous_post_link(__('&laquo; previous article&nbsp;%link &nbsp;&nbsp;&nbsp;', 'use-your-brains')); ?>
            <?php next_post_link(_('next article&nbsp;%link &raquo;', 'use-your-brains')); ?>
	</div>
            <?php endif; ?>
             
    </div>
            <?php get_sidebar(); ?>
</div>
            <?php get_footer(); ?>
