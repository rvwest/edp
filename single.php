<?php
/**
 * The Template for displaying all single posts.
 */

get_header(); ?>

<div class="main-wrapper-item category-<?php foreach( get_the_category() as $cat ) { echo $cat->slug . '  '; } ?>">
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
			</div>
		</div>
	</div>


		<div class="post" id="post-<?php the_ID(); ?>">

<div class="container post-wrap">
	<div class="row-fluid">
		<div id="container" class="span10 center-col">
<div class="overlap-img-title">
		<div class="overlap-title span11 no-gutter-l">
					<h1 class="title "><?php the_title(); ?></h1>


				</div>
						<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
						<div class="overlap-img">
							<?php the_post_thumbnail('large') ?>
						</div>
						<?php } ?>

					</div>

						<div class="skepost-meta span10 clearfix">
							<span class="date"><?php the_time('j F Y') ?></span><span class="author-name"><?php _e(' by ','advertica-lite'); 							if ( function_exists( 'coauthors_posts_links' ) ) {
    coauthors_posts_links();} else {
    the_author_posts_link(first_name, last_name);} ?></span><?php if (get_comments_number()>0) { ?><span class="comments">, <?php comments_popup_link(__('','advertica-lite'), __('1 comment ','advertica-lite'), __('% comments ','advertica-lite')) ; ?></span><?php } ?>
	
	
<br/><?php the_tags('<span class="tags">Tagged: ', ', ', '</span>'); ?></div>


						<!-- skepost-meta -->
			<div id="container" class="span10">
<div id="content">
						<div class="skepost clearfix">
							<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'advertica-lite' ) ); ?>
							<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages :','advertica-lite').'</strong>','after' => '</p>', __('number','advertica-lite'),));	?>


								<hr/>
<?php get_template_part( 'biography', get_post_format() ); ?>
		<hr/>


						</div>
						<!-- skepost -->

						<div class="navigation">
							<span class="nav-previous"><?php previous_post_link( __('&larr; %link','advertica-lite')); ?></span>
							<span class="nav-next"><?php next_post_link( __('%link &rarr;','advertica-lite')); ?></span>
						</div>
						<div class="clearfix"></div>
<br/>
						<?php if ( is_active_sidebar( 'post_cta_1' ) ) : ?>
							<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
								<?php dynamic_sidebar( 'post_cta_1' ); ?>
							</div><!-- #primary-sidebar -->
						<?php endif; ?>
						<div class="comments-template">
							<?php comments_template( '', true ); ?>
						</div>
					</div>
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
