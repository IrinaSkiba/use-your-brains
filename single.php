<?php get_header(); ?>
    <div class="content">
	<?php if(have_posts() ) : 
	while(have_posts() ) : the_post(); ?>
            <div class="post-main">
		<h1><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
		<div class="post">
		<?php the_content(); ?><hr/>
		<?php comments_template(); ?>
		</div>
            </div>
            <?php endwhile; ?>
						
	<div class="nav">
            <?php previous_post_link('previous article&nbsp;%link &nbsp;&nbsp;&nbsp;'); ?>
            <?php next_post_link('next article&nbsp;%link'); ?>
	</div>
            <?php endif; ?>
             
    </div>
            <?php get_sidebar(); ?>
</div>
            <?php get_footer(); ?>