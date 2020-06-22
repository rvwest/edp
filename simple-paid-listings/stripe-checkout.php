<?php
/**
 * Simple stripe checkout form.
 *
 * This template can be overridden by copying it to yourtheme/simple-paid-listings/stripe-checkout.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager-simple-paid-listings
 * @category    Template
 * @version     1.4.0
 * @since       1.4.0
 */
?>
<div class="progressbar-container">
<ul class="progressbar">
<li>Write</li>
<li >Preview</li>
<li class="active">Pay</li>
</ul>
</div>

<form action="<?php echo esc_url( $action ); ?>" method="post" id="stripe-checkout-form" class="job-manager-form" data-secret="<?php echo esc_attr( $intent_client_secret ); ?>">
	
		

	<div class="job_listing_stripe_checkout_form ">	
	<fieldset class="fieldset-stripe_payment fieldset-type-text job-details-block">
		<div>	
		<label class="job-listing">
				<?php esc_html_e( 'Job listing', 'wp-job-manager-simple-paid-listings' ); ?>
			</label>
			<div class="field">
				<span class="item-description"><?php echo esc_html( $item_description ); ?></span>
				
			</div></div>
			<div>
			<span class="item-cost"><?php echo esc_html( $item_cost ); ?></span></div>
		</fieldset>

		<div class="option-cols">
		<div class="option-col1">
		
		<h2>Pay by card <img class="stripe-badge" alt="Powered by Stripe" src="/wp-content/themes/edpsy/images/powered_by_stripe.svg" /></h2>
	
		<fieldset class="fieldset-name fieldset-type-text">
			<label for="stripe-cardholder-name">
				<?php esc_html_e( 'Cardholder Name', 'wp-job-manager-simple-paid-listings' ); ?>
			</label>
			<div class="field">
				<div class="stripe-name-field">
					<input type="text" class="input-text" name="cardholder-name" id="stripe-cardholder-name" required />
				</div>
			</div>
		</fieldset>
		
		<fieldset class="fieldset-stripe_payment fieldset-type-text">
			<label for="card-element">
				<?php esc_html_e( 'Payment Details', 'wp-job-manager-simple-paid-listings' ); ?>
			</label>
			<div class="field">
				<div id="stripe-card-element" class="stripe-payment-card-field"></div>
				<div id="stripe-card-errors" class="stripe-payment-card-errors" role="alert"></div>
			</div>
		</fieldset>
		
	

	<input type="hidden" name="job_id" value="<?php echo esc_attr( $job_id ); ?>" />
	<input type="hidden" name="step" value="<?php echo esc_attr( $step ); ?>" />
	<input type="hidden" name="job_manager_form" value="<?php echo esc_attr( $form_name ); ?>" />

	<input type="submit" name="submit_payment" class="button" value="<?php esc_attr_e( 'Submit Payment', 'wp-job-manager-simple-paid-listings' ); ?>" />
	<span class="spinner" style="background-image: url(<?php echo esc_url( includes_url( 'images/spinner.gif' ) ); ?>);"></span>
	<div class="option-block-or">OR</div>	
</div>
<div class="option-col2">	
<h2>Pay by purchase order</h2>
<p class="option-block-top-text">Email <a href="mailto:payments@edpsy.org.uk">payments@edpsy.org.uk</a> with your:</p>
<ul><li>Purchase order number</li>
<li>Job reference: <strong><?php echo esc_html( $job_id ); ?></strong>
</li>
</ul> 
<p>Once we've received this we will issue an invoice and publish your job listing.</p>
</div>
</form>

