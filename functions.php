<?php
function brains_widgets_init() {
    register_sidebar(array( 
        'name'          => __( 'Sidebar Area', 'use-your-brains' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Appears in the right section of the site.', 'use-your-brains' ),
	));

    register_sidebar(array(
		'name' 			=> __( 'Footer', 'use-your-brains' ),
		'id'            => 'footer-1',
		'description'   => __( 'Appears at the bottom of the site.', 'use-your-brains' ),
	));
}

function brains_default_init() {
    $args = array(
	'width'                     => 930,
	'height'                    => 270,
	'default-image'             => get_template_directory_uri() . '/images/elephant.png',
	'uploads'                   => true,
    'header-text'               => false);
    add_theme_support('custom-header', $args);

    $args = array('default-color' => '#F8F8FF');
    add_theme_support('custom-background', $args);
	
	add_theme_support('automatic-feed-links');
    
    add_theme_support('post-thumbnails'); //Support of mini img
    set_post_thumbnail_size(166, 124);
	
	load_theme_textdomain( 'use-your-brains', get_template_directory() . '/languages' );
	
	add_theme_support( 'title-tag' );
	
	register_nav_menu( 'primary', __( 'Primary Menu', 'use-your-brains' ) );
	
	register_default_headers( array(
    'wheel' => array(
        'url'           => '%s/images/elephant.png',
        'thumbnail_url' => '%s/images/elephant.png',
        'description'   => __( 'Elephant-Octopus Mural', 'use-your-brains' )
    )
) );
}

function brains_wp_title($title, $sep) {
    global $paged, $page;

    if (is_feed())
    	return $title;

    // Add the site name.
    $title .= get_bloginfo('name');
	
    // Add the site description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && (is_home() || is_front_page()))
    	$title = "$title $sep $site_description";
	
    // Add a page number if necessary.
    if ($paged >= 2 || $page >= 2)
    	$title = "$title $sep " . sprintf(__('Page %s', 'use-your-brains'), max($paged, $page));
	
    return $title;
}


function brains_wp_comments_corenavi() {
    $pages = '';
    $max = get_comment_pages_count();
    $page = get_query_var('cpage');
    if (!$page) $page = 1;
    $a['current'] = $page;
    $a['echo'] = false;
	
    $total = 0; 
    $a['mid_size'] = 3;
    $a['end_size'] = 1; 
    $a['prev_text'] = '&laquo;'; 
    $a['next_text'] = '&raquo;'; 
	
    if ($max > 1) echo '<div class="commentNavigation">';
    if ($total == 1 && $max > 1) $pages = '<span class="pages"> ' . $page . '  ' . $max . '</span>'."\r\n";
    echo $pages . paginate_comments_links($a);
    if ($max > 1) echo '</div>';
}

function brains_excerpt_length($length) {
    return 100;
}

add_action('after_setup_theme', 'brains_default_init');
add_filter('wp_title', 'brains_wp_title', 10, 2);
add_action('widgets_init', 'brains_widgets_init');
add_filter('excerpt_length', 'brains_excerpt_length');

if (!isset($content_width)) $content_width = 700;

function brain_scripts() {
	wp_enqueue_style( 'brain-style', get_stylesheet_uri() );
	wp_enqueue_style( 'brain-font', 'http://fonts.googleapis.com/css?family=Kelly+Slab&subset=latin,cyrillic'); 
	
	if (is_singular()) wp_enqueue_script("comment-reply");
}
add_action( 'wp_enqueue_scripts', 'brain_scripts' );

function brain_customize_register( $wp_customize ) {
	$wp_customize->add_section('brain_section_image', array(
		'title' => __( 'Additional header image', 'use-your-brains' ), 
		'priority' => 70
		)
	);

	$wp_customize->add_setting( 'brain_header_image' , array(
        'default' => get_template_directory_uri() . '/images/header.jpg', //The path to the default image. Remove this if you don't want a default.
        'sanitize_callback' => 'esc_url' //the image control uses links, make sure the link is safe.
    ) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'brain_header_image', array(
               'label'      => __( 'Upload an image', 'use-your-brains' ),  //You can change this text to anything you want.
               'section'    => 'brain_section_image',
               'settings'   => 'brain_header_image', //Must be the name that you used in your setting above.

           )
       )
   );

}
add_action( 'customize_register', 'brain_customize_register' );
?>
