<?php
// Don't load directly
defined( 'WPINC' ) or die;

/**
 * Event Submission Form Captcha Block
 * Renders the captcha field in the submission form.
 *
 * Override this template in your own theme by creating a file at
 * [your-theme]/tribe-events/community/modules/captcha.php
 *
 * @link https://evnt.is/1ao4 Help article for Community Events & Tickets template files.
 *
 * @since 4.8.2 Updated template link.
 *
 * @version 4.8.2
 *
 * @var string $captcha The captcha form from the currently loaded captcha module
 */
?>

<div class="tribe-events-community-details " id="event_captcha">
	<?php
	/**
	 * Allow developers to hook and add content to the beginning of this section
	 */
	do_action( 'tribe_events_community_section_before_captcha' );
	?>


	<span class="captcha"><?php echo $captcha; ?></span>

	<?php
	/**
	 * Allow developers to hook and add content to the end of this section
	 */
	do_action( 'tribe_events_community_section_after_captcha' );
	?>
</div>

