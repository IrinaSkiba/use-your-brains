<?php

if(function_exists('register_sidebar')){
    register_sidebar(array('name' => 'sidebar'));
}
register_sidebar(array('name' => 'footer'));
	
add_theme_support('post-thumbnails'); //Support of mini img

set_post_thumbnail_size(166, 124);

function my_excerpt_length($length) {
    return 100;
}
add_filter('excerpt_length', 'my_excerpt_length');

$args = array(
	'default-color' => '#F8F8FF',
);
add_theme_support( 'custom-background', $args );

$args = array(
	'width'         => 929,
	'height'        => 270,
	'default-image' => get_template_directory_uri() . '/images/panda4.jpg',
	'uploads'       => true,
        'header-text'   => false,
);
add_theme_support( 'custom-header', $args );

add_theme_support( 'automatic-feed-links' );

if ( ! isset( $content_width ) ) {
	$content_width = 700;
}

if ( is_singular() ) wp_enqueue_script( "comment-reply" );

comment_form( $args, $post_id );

wp_list_comments( $args, $comments );

wp_link_pages( $args );

get_post_class();

?>
