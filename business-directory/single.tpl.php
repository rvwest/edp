<?php
/**
 * Template listing single view.
 *
 * @package BDP/Templates/Single
 */
?>
<!--single.tpl.php-->
<div id="<?php echo esc_attr( $listing_css_id ); ?>" class="<?php echo esc_attr( $listing_css_class ); ?>">
	<?php wpbdp_x_part( 'parts/listing-title' ); ?>
	<?php
	wpbdp_x_part(
		'parts/listing-buttons',
		array(
			'listing_id' => $listing_id,
			'view'       => 'single',
		)
	);

	wpbdp_x_part( 'single_content' );
	?>
    <?php wpbdp_x_part( 'parts/listing-title' ); ?>
	
</div>