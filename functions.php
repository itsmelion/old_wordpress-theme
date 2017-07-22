<?php
/*
 * @package WordPress
 * @subpackage alive8
 * @since alive8 1.0
 */

/******************************************************************************\
me support, standard settings, menus and widgets
\******************************************************************************/

add_theme_support( 'post-formats', array( 'image', 'quote', 'status', 'link' ) );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );

// =========================================================================
    // REMOVE JUNK FROM HEAD
    // =========================================================================
    remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
    remove_action('wp_head', 'wp_generator'); // remove wordpress version

    remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
    remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links

    remove_action('wp_head', 'index_rel_link'); // remove link to index page
    remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)

    remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
    remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );

/*
custom header styles
 * @return void
 */
function alive8_custom_header() {
	$styles = '';
	if ( $color = get_header_textcolor() ) {
		echo '<style type="text/css"> ' .
												'.site-header .logo .blog-name, .site-header .logo .blog-description {' .
													'color: #' . $color . ';' .
												'}' .
											 '</style>';
	}
}
add_action( 'wp_head', 'alive8_custom_header', 11 );

$custom_bg_args = array(
	'default-color' => 'e0e0e0',
	'default-image' => '',
);
add_theme_support( 'custom-background', $custom_bg_args );

register_nav_menu( 'main-menu', __( 'Your sites main menu', 'alive8' ) );

if ( ! isset( $content_width ) ) $content_width = 650;

/**
clude editor stylesheets
 * @return void
 */

/**
queue alive8 scripts
 * @return void
 */
function alive8_enqueue_scripts() {
wp_enqueue_style( 'alive8-styles', get_stylesheet_uri(), array(), '1.0' );
wp_enqueue_script( 'jquery' );
wp_register_script('jquery-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.min.js', false, '1.12.1', true);
wp_enqueue_script('jquery-ui');
wp_register_script('bootstrap-js', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js', false, '4.0.0-alpha.6', true);
wp_enqueue_script('bootstrap-js');
wp_register_script( 'touchswipe', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.18/jquery.touchSwipe.min.js', false, '1.6.18', true);
wp_enqueue_script('touchswipe');
wp_register_script('jquery-slick', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js', false, '1.6.0', true);
wp_enqueue_script('jquery-slick');
wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/js/jquery-photoswipe/min/jquery.photoswipe-global.js', array(), '1.0', true );
wp_enqueue_script( 'default-scripts', get_template_directory_uri() . '/js/scripts.min.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'alive8_enqueue_scripts' );
