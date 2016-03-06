<!DOCTYPE html>
	<html <?php language_attributes(); ?> >
		<head>
			<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?> charset<?php bloginfo('charset');?> />"
			<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">           
			<?php wp_get_archives('type monthly&format=link'); ?> 
			<?php wp_head(); ?> 
		</head>

		<body <?php body_class(); ?> class="custom-background">
			<div class="main">
				<?php
					if( get_theme_mod('brain_header_image') ){
						echo '<div class="header">';
							echo '<a href="' . esc_url(home_url( '/' )) . '">';
								echo '<img style="height: 250px; width: 970px" src="' . esc_url( get_theme_mod('brain_header_image') ) .'">';
							echo '</a>';
						echo '</div>';
					}	
				?>
                         
				<div class="content-main">
					<ul class="menu">
						<?php wp_nav_menu( array( 'theme_location' => 'primary') );  ?>
						<?php wp_list_pages('title_li'); ?>
						<?php get_search_form(); ?>
					</ul>
				<div class="elephant">
					<?php
					$header_image = get_header_image();
						if ( ! empty( $header_image ) ) {
						//Unless it is hidden:
					?>
						<img class="imagepost" 
							src="<?php echo esc_url( get_custom_header()->url ); ?>" 
							height="<?php echo esc_attr( get_custom_header()->height ); ?>" 
							width="<?php echo esc_attr( get_custom_header()->width ); ?>" alt="" 
						/>
						<?php
						}
						?>
				</div>