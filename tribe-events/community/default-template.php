<?php
/**
 * Default Events Template placeholder:
 * Used to display community events content within the default events template itself.
 *
 * @link   https://evnt.is/1ao4 Help article for Community Events & Tickets template files.
 *
 * @since  4.10.0 
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Allows filtering the classes for the main element.
 *
 * @since 5.8.0
 *
 * @param array<string> $classes An (unindexed) array of classes to apply.
 */
$classes = apply_filters( 'tribe_default_events_template_classes', [ 'tribe-events-pg-template' ] );

get_header();

?>
<div class="main-wrapper-item category-events  ">

<div class="bread-title-holder">
		<div class="container">
			<div class="row-fluid">
				<section class="cont_nav"><div class="cont_nav_inner"><?php	tribe_breadcrumbs(); ?></div></section>			</div>
		</div>
	</div>
	<div class="page-content default-pagetemp">
		<div class="container post-wrap">
			<div class="row-fluid">
				<div id="content" class="span8 center-col">
	<main
		id="tribe-events-pg-template"
		<?php tribe_classes( $classes ); ?>
	>
		<?php
		while ( have_posts() ) {
			the_post();
			the_content();
		}
		?>
	</main>
	</div></div></div></div></div> <!-- #tribe-events-pg-template -->
<?php

get_footer();
?>