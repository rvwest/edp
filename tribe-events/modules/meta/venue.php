<?php
/**
 * Single Event Meta (Venue) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/venue.php
 *
 * @package TribeEventsCalendar
 */

if ( ! tribe_get_venue_id() ) {
	return;
}

$phone   = tribe_get_phone();
$website = tribe_get_venue_website_link();

?>

<div class="tribe-events-meta-group tribe-events-meta-group-venue">
	<h3 class="tribe-events-single-section-title"> <?php esc_html_e( tribe_get_venue_label_singular(), 'the-events-calendar' ) ?> </h3>
	<dl>
		<?php do_action( 'tribe_events_single_meta_venue_section_start' ) ?>

		<dd class="tribe-venue"> <?php
    $event_id = get_the_id();
    $venue_url = tribe_get_event_meta( tribe_get_venue_id( $event_id ), '_VenueURL', true );
    $venue_name = get_the_title( tribe_get_venue_id( $event_id  ) );
    if ( $venue_url ) {
        echo '<a href="' . esc_url( $venue_url ) . '">' . esc_html( $venue_name ) . '</a>';
    } else {
        echo esc_html( $venue_name );
    }
?> </dd>

		<?php if ( tribe_address_exists() ) : ?>
			<dd class="tribe-venue-location">
				<address class="tribe-events-address">
					<?php echo tribe_get_full_address(); ?>
				</address>
			</dd>
		<?php endif; ?>

		<?php if ( ! empty( $phone ) ): ?>
			<dt> <?php esc_html_e( 'Phone:', 'the-events-calendar' ) ?> </dt>
			<dd class="tribe-venue-tel"> <?php echo $phone ?> </dd>
		<?php endif ?>

		<?php do_action( 'tribe_events_single_meta_venue_section_end' ) ?>
	</dl>
</div>
