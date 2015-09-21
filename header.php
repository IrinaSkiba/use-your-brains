<!DOCTYPE html>
	<html <?php language_attributes(); ?> >
		<head>
			<title><?php wp_title('|', true, 'right'); ?></title>
			<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?> charset<?php bloginfo('charset');?> />"
			<meta name="generator" content="Wordpress <?php bloginfo('version'); ?>" />
			<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
			<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
			<link rel="alternate" type="application/rss+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
			<link rel="shortcut icon" href="/img/.png" />
			<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?> "
			type="text/css" media="screen" />
			
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
                        
			<?php wp_get_archives( 'type monthly&format=link'); ?> 
			<?php wp_head(); ?> 

		</head>

		<body <?php body_class(); ?> class="custom-background">
		
			<div class="main">
                            
                            <a href="/">

				<div class="header">

				</div>
                            </a>
                            
				<div class="content-main">
					<ul class="menu">
						<?php wp_list_pages('title_li'); ?>
						<?php include(TEMPLATEPATH . './searchform.php'); ?>
					</ul>
					<!--<div class="slon"><img class="imagepost" src="<?php echo esc_url( get_template_directory_uri() ) ?>/images/slon.png" /></div>-->
                                            <div class="slon">
                                                <img class="imagepost" 
                                                src="<?php header_image(); ?>" 
                                                height="<?php echo get_custom_header()->height; ?>" 
                                                width="<?php echo get_custom_header()->width; ?>" alt="" />
                                            </div>