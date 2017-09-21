<?php
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Configurações Gerais',
		'menu_title'	=> 'General Settings',
		'menu_slug' 	=> 'general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Headings',
		'parent_slug'	=> 'general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'general-settings',
	));
	
}
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


/******************************************************************************\
	Theme support, standard settings, menus and widgets
\******************************************************************************/

add_theme_support( 'post-formats', array( 'image', 'quote', 'status', 'link' ) );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );

$custom_header_args = array(
	'width'         => 1920,
	'height'        => 1080,
	'default-image' => get_template_directory_uri() . 'dist/images/header.png',
);
add_theme_support( 'custom-header', $custom_header_args );

/**
 * Print custom header styles
 * @return void
 */
function sense_custom_header() {
	$styles = '';
	if ( $color = get_header_textcolor() ) {
		echo '<style type="text/css"> ' .
				'html,body .site-header .logo .blog-name, .site-header .logo .blog-description .text-color {' .
					'color: #' . $color . ' !important;' .
				'}' .
			 '</style>';
	}
}
add_action( 'wp_head', 'sense_custom_header', 11 );

$custom_bg_args = array(
	'default-color' => 'fba919',
	'default-image' => '',
);
add_theme_support( 'custom-background', $custom_bg_args );

register_nav_menu( 'main-menu', __( 'Your sites main menu', 'menu' ) );

if ( ! isset( $content_width ) ) $content_width = 1024;


/******************************************************************************\
	Scripts and Styles
\******************************************************************************/
// Intented to use with locations, like 'primary'
// clean_custom_menu("primary");
 
#add in your theme functions.php file
 
function clean_custom_menu( $theme_location ) {
    if ( ($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location]) ) {
        $menu = get_term( $locations[$theme_location], 'nav_menu' );
        $menu_items = wp_get_nav_menu_items($menu->term_id);
 
        $menu_list  = '<nav>' ."\n";
        $menu_list .= '<ul class="main-nav">' ."\n";
 
        $count = 0;
        $submenu = false;
         
        foreach( $menu_items as $menu_item ) {
             
            $link = $menu_item->url;
            $title = $menu_item->title;
             
            if ( !$menu_item->menu_item_parent ) {
                $parent_id = $menu_item->ID;
                 
                $menu_list .= '<li class="item">' ."\n";
                $menu_list .= '<a href="'.$link.'" class="title">'.$title.'</a>' ."\n";
            }
 
            if ( $parent_id == $menu_item->menu_item_parent ) {
 
                if ( !$submenu ) {
                    $submenu = true;
                    $menu_list .= '<ul class="sub-menu">' ."\n";
                }
 
                $menu_list .= '<li class="item">' ."\n";
                $menu_list .= '<a href="'.$link.'" class="title">'.$title.'</a>' ."\n";
                $menu_list .= '</li>' ."\n";
                     
 
                if ( $menu_items[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ){
                    $menu_list .= '</ul>' ."\n";
                    $submenu = false;
                }
 
            }
 
            if ( $menu_items[ $count + 1 ]->menu_item_parent != $parent_id ) { 
                $menu_list .= '</li>' ."\n";      
                $submenu = false;
            }
 
            $count++;
        }
         
        $menu_list .= '</ul>' ."\n";
        $menu_list .= '</nav>' ."\n";
 
    } else {
        $menu_list = '<!-- no menu defined in location "'.$theme_location.'" -->';
    }
    echo $menu_list;
}
/**
 * Enqueue theme scripts
 * @return void
 */
function theme_enqueue_scripts() {
	wp_enqueue_style( 'sense-styles', get_stylesheet_uri(), array(), '1.0' );
	wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'default-scripts', get_template_directory_uri() . '/build/scripts/app.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );


/******************************************************************************\
	Content functions
\******************************************************************************/

/**
 * Displays meta information for a post
 * @return void
 */
function sense_post_meta() {
	if ( get_post_type() == 'post' ) {
		echo sprintf(
			__( 'Posted %s in %s%s by %s. ', 'admin' ),
			get_the_time( get_option( 'date_format' ) ),
			get_the_category_list( ', ' ),
			get_the_tag_list( __( ', <b>Tags</b>: ', 'admin' ), ', ' ),
			get_the_author_link()
		);
	}
	edit_post_link( __( ' (edit)', 'admin' ), '<span class="edit-link">', '</span>' );
}