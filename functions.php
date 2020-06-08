<?php
/**
 * Advertica functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 */

 // Async load
function ikreativ_async_scripts($url)
{
    if ( strpos( $url, '#asyncload') === false )
        return $url;
    else if ( is_admin() )
        return str_replace( '#asyncload', '', $url );
    else
	return str_replace( '#asyncload', '', $url )."' async='async"; 
    }
add_filter( 'clean_url', 'ikreativ_async_scripts', 11, 1 );

/**
 * Registers widget areas.
 *
 */
function advertica_lite_widgets_init() {
	register_sidebar(array(
		'name' => 'Page Sidebar',
		'id' => 'page-sidebar',
		'before_widget' => '<li id="%1$s" class="ske-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="ske-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Blog Sidebar',
		'id' => 'blog-sidebar',
		'before_widget' => '<li id="%1$s" class="ske-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="ske-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Footer Sidebar',
		'id' => 'footer-sidebar',
		'before_widget' => '<div id="%1$s" class="ske-footer-container span3 ske-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="ske-title ske-footer-title">',
		'after_title' => '</h3>',
	));
}
add_action( 'widgets_init', 'advertica_lite_widgets_init' );

/**
 * Sets up theme defaults and registers the various WordPress features that
 * Advertica supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add Visual Editor stylesheets.
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
*/
function advertica_lite_theme_setup() {
	/*
	 * Makes Advertica available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Thirteen, use a find and
	 * replace to change 'advertica-lite' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'advertica-lite', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	add_theme_support( 'title-tag' );

	if ( get_option('advertica_lite') != '' ) {
		$advertica_lite_pre_options = get_option('advertica_lite');
		$header_image =	$advertica_lite_pre_options['advertica_frontslider_stype'];
	} else {
		$header_image = get_template_directory_uri() . '/images/advertica-header.jpg';
	}
	add_theme_support( 'custom-header', array( 'flex-width' => true, 'width' => 1600, 'flex-height' => true, 'height' => 500, 'default-image' => $header_image ) );

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'advertica_lite_custom_background_args', array('default-color' => 'ffffff') ) );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages....
	 */
	add_theme_support('post-thumbnails'); 

	/**
	 * Enable support for Post Formats
	 */
	set_post_thumbnail_size( 600, 220, true );
	add_image_size( 'advertica_standard_img',770,365,true); //standard size
	add_image_size( 'edpsy_loop_img',480,280,true); //homepage

	/**
	* SETS UP THE CONTENT WIDTH VALUE BASED ON THE THEME'S DESIGN.
	*/
	global $content_width;
	if ( ! isset( $content_width ) ){
	      $content_width = 900;
	}

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'Header' => __( 'Main Navigation', 'advertica-lite' ),
	));
}
add_action( 'after_setup_theme', 'advertica_lite_theme_setup' );

/**
* Funtion to add CSS class to body
*/
function advertica_lite_add_class( $classes ) {

	if ( 'page' == get_option( 'show_on_front' ) && ( '' != get_option( 'page_for_posts' ) ) && is_front_page() ) {
		$classes[] = 'front-page';
	}

	return $classes;
}
add_filter( 'body_class','advertica_lite_add_class' );

/**
 * Filter content with empty post title
 *
 */

add_filter('the_title', 'advertica_lite_untitled');
function advertica_lite_untitled($title) {
	if ($title == '') {
		return __('Untitled','advertica-lite');
	} else {
		return $title;
	}
}

/**
 * Add Customizer
 */
require get_template_directory() . '/includes/customizer.php';
/**
 * Add Required Files
 */
require_once(get_template_directory() . '/SketchBoard/functions/admin-init.php');
/**
 * Add Sketchthemes page
 */
require_once(get_template_directory() . '/includes/sketchtheme-upsell.php');
/**
 * Add Options Migration page
 */
$advertica_lite_pre_options = ( get_option('advertica_lite') != '' ) ? get_option( 'advertica_lite' ) : false ;

if ( $advertica_lite_pre_options) {

	require_once(get_template_directory() . '/includes/advertica-options-migrate.php');

}

function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/** Add Google librbary version of jQuery **/

//Making jQuery Google API

function modify_jquery() {
    if (!is_admin()) {
        // comment out the next two lines to load the local copy of jQuery
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', false, null);
        wp_enqueue_script('jquery');
    }
}
add_action('init', 'modify_jquery');

add_filter('wpseo_title', 'my_co_author_wseo_title');
function my_co_author_wseo_title( $title ) {

	// Only filter title output for author pages
	if ( is_author() && function_exists( 'get_coauthors' ) ) {
		$qo = get_queried_object();
		$author_name = $qo->display_name;
		return $author_name . '&#39;s articles on ' . get_bloginfo('name');
	}
	return $title;

}

// Check if page is direct child
function is_child( $page_id ) {
	global $post;
	if( is_page() && ($post->post_parent != '') ) {
		return true;
	} else {
		return false;
	}
}

// Breadcrumb Logic
function tribe_breadcrumbs() {
	global $post;

	$separator = '&nbsp;<span class="skt-breadcrumbs-separator"> &gt;&gt; </span>&nbsp;';

	echo '<div class="tribe-breadcrumbs"><p>';
	echo '<a href="' . get_option('home') . '">' . Home . '</a>';

	if( tribe_is_month() && !is_tax() ) { // The Main Calendar Page
		echo $separator;
		echo 'Events';
	} elseif( tribe_is_month() && is_tax() ) { // Calendar Category Pages
		global $wp_query;

		$term_slug = $wp_query->query_vars['tribe_events_cat'];
		$term = get_term_by('slug', $term_slug, 'tribe_events_cat');
		get_term( $term_id, 'tribe_events_cat' );
		$name = $term->name;
		echo $separator;
		echo '<a href="'.tribe_get_events_link().'">Events</a>';
		echo $separator;
		echo $name;
	} elseif( tribe_is_event() && !tribe_is_day() && !is_single() ) { // The Main Events List
		echo $separator;
		echo 'Events List';
	} elseif( tribe_is_event() && is_single() ) { // Single Events
		echo $separator;
		echo '<a href="'.tribe_get_events_link().'">Events</a>';
		echo $separator;
		the_title();
	} elseif( tribe_is_day() ) { // Single Event Days
		global $wp_query;

		echo $separator;
		echo '<a href="'.tribe_get_events_link().'">Events</a>';
		echo $separator;
		echo 'Events on: ' . date('F j, Y', strtotime( $wp_query->query_vars['eventDate']) );
	} elseif( tribe_is_venue() ) { // Single Venues
		echo $separator;
		echo '<a href="'.tribe_get_events_link().'">Events</a>';
		echo $separator;
		the_title();
	} elseif ( is_category() || is_single() ) {
		echo $separator;
		the_category(' &bull; ');

		if ( is_single() ) {
			echo ' '.$separator.' ';
			the_title();
		}
	} elseif ( is_page() ) {
		if( is_child(get_the_ID()) ) {
			echo $separator;
			echo '<a href="' . get_permalink( $post->post_parent ) . '">' . get_the_title( $post->post_parent ) . '</a>';
			echo $separator;
			echo the_title();
		} else {
			echo $separator;
			echo the_title();
		}
	} elseif (is_search()) {
		echo $separator.'Search Results for... ';
		echo '"<em>';
		echo the_search_query();
		echo '</em>"';
	}
	echo '</p></div>';
}

/**
 * Changing Job Manager fields
 *
 */
// Add your own function to filter the fields
add_filter( 'submit_job_form_fields', 'custom_submit_job_form_fields' );

// This is your function which takes the fields, modifies them, and returns them
// You can see the fields which can be changed here: https://github.com/mikejolley/WP-Job-Manager/blob/master/includes/forms/class-wp-job-manager-form-submit-job.php
function custom_submit_job_form_fields( $fields ) {

    // Here we target one of the job fields (job_title) and change it's label
	$fields['job']['job_location']['description'] = "";
	$fields['job']['job_location']['description'] = "";
	$fields['job']['job_location']['placeholder'] = "";
	$fields['job']['application']['label'] = "Where to apply";
	$fields['job']['application']['description'] = "eg https://yourorg.gov.uk/apply";
	$fields['job']['application']['placeholder'] = "";
	$fields['company']['company_name']['placeholder'] = "";
	$fields['company']['company_name']['label'] = "Organisation name";
	$fields['company']['company_name']['placeholder'] = "";
	$fields['company']['company_tagline']['placeholder'] = "Briefly describe your organisation";
	$fields['company']['company_twitter']['placeholder'] = "@YourOrganisation";
	$fields['company']['company_twitter']['placeholder'] = "@YourOrganisation";
	$fields['company']['company_logo']['description'] = "Will be cropped into a square. Maximum file size 32 MB";
	$fields['company']['company_logo']['allowed_mime_types'] = [
		'jpg'  => 'image/jpeg',
		'jpeg' => 'image/jpeg',
		'gif'  => 'image/gif',
		'png'  => 'image/png',
		'svg'  => 'image/svg',
	];
	unset($fields['company']['company_video']);

    // And return the modified fields
    return $fields;
}
 
add_filter( 'wpjm_get_registration_fields', 'custom_registration_fields' );

function custom_registration_fields( $fields ) {
    // Here we target one of the job fields (job_title) and change it's label
	$fields['create_account_email']['label'] = "Your email";
	$fields['create_account_email']['placeholder'] = "";
	$fields['create_account_email']['description'] = "";
    // And return the modified fields
    return $fields;
} 


/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Post call to action area',
		'id'            => 'post_cta_1',
		'before_widget' => '<div class="post_cta" id="signup">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Jobs call to action area',
		'id'            => 'post_cta_2',
		'before_widget' => '<div class="post_cta" id="signup">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Jobs admin call to action area',
		'id'            => 'post_cta_3',
		'before_widget' => '<div class="post_cta" id="signup">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

?>
