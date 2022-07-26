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
/*require_once(get_template_directory() . '/includes/sketchtheme-upsell.php');
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

/** Add Google library version of jQuery **/

//Making jQuery Google API

function modify_jquery() {
    if (!is_admin()) {
        // comment out the next two lines to load the local copy of jQuery
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', false, null);
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
	$fields['job']['job_location']['placeholder'] = "";
	$fields['job']['application']['label'] = "Where to apply";
	$fields['job']['application']['description'] = "eg https://yourorg.gov.uk/apply";
	$fields['job']['application']['value'] = "http://";
	$fields['job']['application']['placeholder'] = "";
	$fields['job']['job_type']['description'] = "You can select more than one";
	$fields['company']['company_name']['placeholder'] = "";
	$fields['company']['company_name']['label'] = "Organisation name";
	$fields['company']['company_logo']['description'] = "Maximum file size 32 MB";
	$fields['company']['company_logo']['allowed_mime_types'] = [
		'jpg'  => 'image/jpeg',
		'jpeg' => 'image/jpeg',
		'gif'  => 'image/gif',
		'png'  => 'image/png',
	];
	$fields['job']['closing_date'] = array(
		'label'       => __( 'Closing date', 'job_manager' ),
		'type'        => 'date',
		'data_type' => 'string',
		'required'    => false,
		'classes'     => [ 'job-manager-datepicker' ],
		'priority'    => 8,
		'description' => "eg 12 March 2022",
		'sanitize_callback'  => [ __CLASS__, 'sanitize_meta_field_date' ],
	  );
	$fields['job']['cap_declaration'] = array(
		'label'       => __( 'Declaration', 'job_manager' ),
		'type'        => 'checkbox',
		'required'    => true,
		'placeholder' => 'I confirm this to be true',
		'priority'    => 9,
		'description'   => __( '<p>We follow the <a href="https://www.asa.org.uk/type/non_broadcast/code_section/20.html">CAP Code for employment advertisements</a>. Please confirm:</p><ul><li>This is a genuine employment opportunity</li><li>All details provided are comprehensive and accurate</li><li>You are acting directly for the employer, and not an employment agency</li><li>Your organisation is not in dispute with the <abbr title="Association of Educational Psychologists">AEP</abbr></li></ul>', 'wp-job-manager' ),
	  );

	unset($fields['company']['company_video']);
	unset($fields['company']['company_tagline']);
	unset($fields['company']['company_twitter']);

    // And return the modified fields
    return $fields;
}

add_filter( 'job_manager_job_listing_data_fields', 'admin_add_custom_admin_fields' );

function admin_add_custom_admin_fields( $fields ) {
	
	$fields['_closing_date'] = array(
		'label'       => __( 'Job closing date', 'wp-job_manager' ),
		'data_type'   => 'string',
		'classes'     => [ 'job-manager-datepicker' ],
		'show_in_admin' => true,
		'placeholder' => '',
		'description' => 'I confirm the above is true',
		'priority'    => 13,
	  );
	  $fields['_cap_declaration'] = array(
		'label'       => __( 'Declaration', 'wp-job_manager' ),
		'type'        => 'checkbox',
		'data_type'   => 'integer',
		'show_in_admin' => true,
		'placeholder' => '',
		'description' => 'I confirm the above is true',
		'priority'    => 12,
	  );
	  unset($fields['company']['company_video']);
	  unset($fields['company']['company_tagline']);
	  unset($fields['company']['company_twitter']);
	 
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


add_filter( 'submit_job_form_submit_button_text', 'custom_submit_job_form_submit_button_text' );

function custom_submit_job_form_submit_button_text( $button_text ) {
	return __( 'Preview and continue', 'wp-job-manager-simple-paid-listings' );
}

add_filter( 'submit_job_step_preview_submit_text', 'custom_submit_button_text' );

function custom_submit_button_text( $button_text ) {
	return __( 'Confirm and pay', 'wp-job-manager-simple-paid-listings' );
}

add_filter( 'job_manager_update_job_listings_message', 'custom_job_manager_update_job_listings_message' );

function custom_job_manager_update_job_listings_message( $save_message ) { 
	return ('<i class="far fa-check-circle"></i> Your changes have been saved. <a href="' . esc_url( job_manager_get_permalink( 'job_dashboard' )) . '">Return to your dashboard</a>.');
}

add_filter( 'submit_job_form_fields', 'remove_remote_option' );

function remove_remote_option( $fields ) {
    //remove the remote_position field
    unset($fields['job']['remote_position']);

    return $fields;
}

// URL-slug Remove job type
add_filter( 'submit_job_form_prefix_post_name_with_job_type', '__return_false' );

// Add Job ID to slug
function custom_job_post_type_link( $post_id, $post ) {

	// don't add the id if it's already part of the slug
	$permalink = $post->post_name;
	if ( strpos( $permalink, strval( $post_id ) ) ) {
		return;
	}
	
	// unhook this function to prevent infinite looping
	remove_action( 'save_post_job_listing', 'custom_job_post_type_link', 10, 2 );

 // add the id to the slug
	$permalink .= '-' . $post_id;

	// update the post slug
	wp_update_post( array(
		'ID' => $post_id,
		'post_name' => $permalink
	));

	// re-hook this function
	add_action( 'save_post_job_listing', 'custom_job_post_type_link', 10, 2 );
}
add_action( 'save_post_job_listing', 'custom_job_post_type_link', 10, 2 );

// Change jobs shortcode output
 
add_action("init", function () {


    remove_shortcode("job_summary");

    add_shortcode("job_summary", function ($atts) {

		$atts = shortcode_atts(
			[
				'id'       => '',
				'width'    => '250px',
				'align'    => 'left',
				'featured' => null, // True to show only featured, false to hide featured, leave null to show both (when leaving out id).
				'limit'    => 1,
			],
			$atts
		);

		ob_start();

		$args = [
			'post_type'   => 'job_listing',
			'post_status' => 'publish',
		];

		if ( ! $atts['id'] ) {
			$args['posts_per_page'] = $atts['limit'];
			$args['orderby']        = 'rand';
			if ( ! is_null( $atts['featured'] ) ) {
				$args['meta_query'] = [
					[
						'key'     => '_featured',
						'value'   => '1',
						'compare' => $atts['featured'] ? '=' : '!=',
					],
				];
			}
		} else {
			$args['p'] = absint( $atts['id'] );
		}

		$jobs = new WP_Query( $args );

		if ( $jobs->have_posts() ) {
			while ( $jobs->have_posts() ) {
				$jobs->the_post();
				$width = $atts['width'] ? $atts['width'] : 'auto';
				echo '<div class="span4 post type-post has-post-thumbnail hentry category-blog category-features job_summary_shortcode">';
				get_job_manager_template_part( 'content-summary', 'job_listing' );
				echo '</div>';
			}
		}

		wp_reset_postdata();

		return ob_get_clean();
    });

});


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
add_action( 'single_job_listing_meta_start', 'display_job_closing_date' );
add_action('after_setup_theme', 'remove_admin_bar');
add_action( 'single_job_listing_date_fields_combined', 'gma_wpjmef_display_combined_dates' );

function gma_wpjmef_display_combined_dates() {
  
   
	global $post;
	$closing = get_post_meta($post->ID, '_closing_date', true, get_option('date_format') );
	
	echo '<li class="wpjmef-field-combined"><i class="fas fa-clock fa-fw"></i><div class="wpjmef-dates"><span class="wpjmef-posted"><span>Posted:&nbsp;</span><span>';
	the_job_publish_date();
	echo '&nbsp;</span></span>';

	if ( $closing ) {
	  echo '<span class="wpjmef-field-closing"><span>Closing date:&nbsp;</span><span>' . date("j F Y", strtotime($closing) ) . ' </span></span>';
	}
      
	echo '</div></li>';
  
}
/*
function display_job_closing_date() {
	global $post;
  
	$closingdate = get_post_meta( $post->ID, '_closing_date', true );
  
	if ( $closingdate ) {
	  echo '<li>' . __( 'Closing date:' ) . '' . esc_html( $closingdate ) . '</li>';
	}
  }
*/
function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}

// Tribe community events - submission form help text (to avoid changig the field php)

// Taxonomy = category

function tribe_add_datetime_helptext() {
    echo '<p class="tribe-helptext"><strong>For events that span non-consecutive dates</strong> (eg 7 March and 9 April) add the start date, then put the full details in the description</p>';
}
 
add_action( 'tribe_events_community_section_after_datetime', 'tribe_add_datetime_helptext' );

function tribe_add_website_helptext() {
    echo '<p class="tribe-helptext">For more information about the event. Don\'t worry if there isn\'t one</p>';
}

add_action( 'tribe_events_community_section_after_website', 'tribe_add_website_helptext' );



?>