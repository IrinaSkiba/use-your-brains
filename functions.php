<?php
function brains_widgets_init() {
    register_sidebar(array( 
        'name'          => 'Sidebar Area',
        'id'            => 'sidebar-1',
        'description'   => 'Appears in the right section of the site.'));

    register_sidebar(array('name' => 'footer'));
}

function brains_default_init() {
    $args = array(
	'width'                     => 930,
	'height'                    => 270,
	'default-image'             => get_template_directory_uri() . '/images/slon.png',
	'uploads'                   => true,
        'header-text'               => false);
    add_theme_support('custom-header', $args);

    $args = array('default-color' => '#F8F8FF');
    add_theme_support('custom-background', $args);
    
    add_theme_support('post-thumbnails'); //Support of mini img
    set_post_thumbnail_size(166, 124);
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
    	$title = "$title $sep " . sprintf(__('Page %s', 'useyourbrains'), max($paged, $page));
	
    return $title;
}


function wp_comments_corenavi() {
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

function my_excerpt_length($length) {
    return 100;
}

add_action('after_setup_theme', 'brains_default_init');
add_filter('wp_title', 'brains_wp_title', 10, 2);
add_action('widgets_init', 'brains_widgets_init');
add_filter('excerpt_length', 'my_excerpt_length');

add_theme_support('automatic-feed-links');

if (!isset($content_width)) $content_width = 700;
if (is_singular()) wp_enqueue_script("comment-reply");

wp_link_pages();
?>
