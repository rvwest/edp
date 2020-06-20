<?php
/**
 * In job listing creation flow, this template shows above the job creation form.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/account-signin.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @version     1.33.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<?php if ( is_user_logged_in() ) : ?>

	<div class="fieldset-logged_in">
		<h2>Your account</h2>
		<div class="field account-sign-in">
			<?php
				$user = wp_get_current_user();
				printf( wp_kses_post( __( '<p class="signin-text">You are currently signed in as <strong>%s</strong>. To view your drafts go to your <a href="/job-dashboard">job dashboard</a>.</p>
				', 'wp-job-manager' ) ), esc_html( $user->user_login ) );
			?>

			<p><a class="button secondary" href="<?php echo esc_url( apply_filters( 'submit_job_form_logout_url', wp_logout_url( get_permalink() ) ) ); ?>"><?php esc_html_e( 'Sign out', 'wp-job-manager' ); ?></a></p>
		</div>
</div>

<?php else :
	$account_required            = job_manager_user_requires_account();
	$registration_enabled        = job_manager_enable_registration();
	$registration_fields         = wpjm_get_registration_fields();
	$use_standard_password_email = wpjm_use_standard_password_setup_email();
	?>
	<div class="fieldset-login_required">
	<h2>Account</h2>	
	<!-- <label><?php esc_html_e( 'Have an account?', 'wp-job-manager' ); ?></label>
	 -->	<div class="field account-sign-in">
		 <p>
			<a class="button secondary" href="<?php echo esc_url( apply_filters( 'submit_job_form_login_url', wp_login_url( get_permalink() ) ) ); ?>"><?php esc_html_e( 'Sign in', 'wp-job-manager' ); ?></a>
</p>
			 <?php if ( $registration_enabled ) : ?>

				<!-- <?php printf( esc_html__( 'If you don\'t have an account you can %screate one below by entering your email address.', 'wp-job-manager' ), $account_required ? '' : esc_html__( 'optionally', 'wp-job-manager' ) . ' ' ); ?> 
				<?php if ( $use_standard_password_email ) : ?>
					<?php printf( esc_html__( 'Your account details will be confirmed via email.', 'wp-job-manager' ) ); ?>
				
					<?php endif; ?> -->

			<?php elseif ( $account_required ) : ?>

				<?php echo wp_kses_post( apply_filters( 'submit_job_form_login_required_message',  __( 'You must sign in to create a new listing.', 'wp-job-manager' ) ) ); ?>

			<?php endif; ?>
		</div>
			</div>
	<p>If you don't have an account, please enter your email address. We will send you your account details by email</p>
	<h2>Create account</h2>
	<?php
	if ( ! empty( $registration_fields ) ) {
		foreach ( $registration_fields as $key => $field ) {
			?>
			<fieldset class="fieldset-<?php echo esc_attr( $key ); ?>">
				<label
					for="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $field[ 'label' ] ) . wp_kses_post( apply_filters( 'submit_job_form_required_label', $field[ 'required' ] ? '' : ' <small>' . __( '(optional)', 'wp-job-manager' ) . '</small>', $field ) ); ?></label>
				<div class="field <?php echo $field[ 'required' ] ? 'required-field draft-required' : ''; ?>">
					<?php get_job_manager_template( 'form-fields/' . $field[ 'type' ] . '-field.php', [ 'key'   => $key, 'field' => $field ] ); ?>
				</div>
		</fieldset>
			<?php
		}
		do_action( 'job_manager_register_form' );
	}
	?>
<?php endif; ?>