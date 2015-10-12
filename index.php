<?php get_header(); ?>
	<div class="content">
            <?php if(have_posts()) : 
                while(have_posts()) : the_post(); ?>
                    <div <?php post_class('post-main'); ?>>
			<h1><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
                        <div <?php post_class('post'); ?>>
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                            <?php the_excerpt(); ?>
                            <p><a href="<?php the_permalink();?>">read more</a></p>
                            <p><span> <?php the_date_xml(); ?></span></p><p><?php the_tags(); ?></p>
                        </div>
                    </div>
		<?php endwhile; ?>
            <?php endif; ?>
            <?php the_posts_pagination(array('end_size' => 2,
                                             'mid_size' => 2,
                                             'prev_text' => "Previous page",
                                             'next_text' => "Next page",
                                             'screen_reader_text' => " "));?>
        </div>
	<?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>