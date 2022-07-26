<?php
/**
 * Job listing summary
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-summary-job_listing.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @version     1.31.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $job_manager;
?>
<a href="<?php the_permalink(); ?>" class="crp_link post-3212 crp_job">
	<?php if ( $logo = get_the_company_logo() ) : ?>
		<figure>
			<img src="<?php echo esc_url( $logo ); ?>" alt="<?php the_company_name(); ?>" title="<?php the_company_name(); ?>" class="crp_thumb crp_featured crp_job_logo" />
			<img width="480" height="280" src="http://localhost/wp-content/uploads/2022/06/john-schaidler-9V3Q2W_mRLE-unsplash-480x280.jpg" class="attachment-edpsy_loop_img size-edpsy_loop_img wp-post-image" alt="" loading="lazy">
	</figure>
	<?php endif; ?>
	<span class="crp_title"><span class="title-tag"><i class="far fa-bell-on"></i> New job: </span><?php wpjm_the_job_title(); ?>
		- <?php the_job_location( false ); ?>
	</span>
	</div>
</a>

