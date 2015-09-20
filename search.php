<?php get_header(); ?>
    <div class="content">
	<?php if(have_posts() ) : 
            while(have_posts() ) : the_post(); ?>
	<div class="post-main">
            <h1><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
		<div class="post">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                    <?php the_excerpt(); ?>
		</div>
	</div>
	<?php endwhile; ?>
	<?php else : ?>
	<div class="post-main">
            <div class="post">
		<p id="kis">No results found :(<br /><br /><img class="kisya" src="<?php echo esc_url( get_template_directory_uri() ) ?>/images/404.jpg" width="400" height="314" /></p>< /br>
            </div>
	</div>
						
	 <?php endif; ?>
						
    </div>
	<?php get_sidebar(); ?>
    </div>
	<?php get_footer(); ?>