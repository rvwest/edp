<?php
/*
Template Name: Job list template
*/
?>

<?php get_header(); ?>

<div class="wpjm-page wpjm-listing-page main-wrapper-item category-<?php foreach( get_the_category() as $cat ) { echo $cat->slug . '  '; } ?>">
<?php if(have_posts()) : ?>
<?php while(have_posts()) : the_post(); ?>
	<div class="bread-title-holder">
		<!--<div class="bread-title-bg-image full-bg-breadimage-fixed"></div>-->

		<div class="container">
			<div class="row-fluid">
				<?php  if( get_theme_mod('breadcrumb_sec', 'on') == 'on' ) {
						if ((class_exists('advertica_lite_breadcrumb_class'))) {$advertica_breadcumb->advertica_lite_custom_breadcrumb();}
					}
					?>
		<div class="container_inner clearfix">
		<h1 class="title "><?php the_title(); ?></h1>
					
				</div>	
		</div>
		</div>
	</div>


		<div class="post" id="post-<?php the_ID(); ?>">

<div class="container post-wrap">
	<div class="row-fluid">
		<div id="container" class="span10 center-col">

	<div id="content">
						<div class="skepost clearfix">
							<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'advertica-lite' ) ); ?>
							<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages :','advertica-lite').'</strong>','after' => '</p>', __('number','advertica-lite'),));	?>


							


						</div>
						<!-- skepost -->

						
						<div class="clearfix"></div>
<br/>
						<?php if ( is_active_sidebar( 'post_cta_2' ) ) : ?>
							<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
								<?php dynamic_sidebar( 'post_cta_2' ); ?>
							</div><!-- #primary-sidebar -->
						<?php endif; ?>
					
					</div>
					<p class="body-footnote"><i class="fad fa-check"></i> We follow the <a href="https://www.asa.org.uk/type/non_broadcast/code_section/20.html">CAP Code for employment ads</a>.</p>
				<!-- post -->
				<?php endwhile; ?>
				<?php else :  ?>

				<div class="post">
					<h2><?php _e('Post Does Not Exist','advertica-lite'); ?></h2>
				</div>
				<?php endif; ?>
			</div><!-- content -->

</div>


		</div><!-- container -->



	</div>
 </div>
</div>
</div>
<?php get_footer(); ?>