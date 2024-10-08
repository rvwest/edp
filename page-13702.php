<?php 
/**
* The template for displaying all pages.
* 
* Urdu version
* 
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages and that other
* 'pages' on your WordPress site will use a different template.
*
*/
get_header(); ?>
<div class="main-wrapper-item category-<?php foreach( get_the_category() as $cat ) { echo $cat->slug . '  '; } ?>">
	<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
		<div class="bread-title-holder">
			
			<div class="container">
				<div class="row-fluid">
					<div class="container_inner clearfix">
						<?php  if( get_theme_mod('breadcrumb_sec', 'on') == 'on' ) {
							if ((class_exists('advertica_lite_breadcrumb_class'))) {$advertica_breadcumb->advertica_lite_custom_breadcrumb();}
						}
						?>
					</div>
				</div>
			</div>
		</div>

	<div class="page-content default-pagetemp">
		<div class="container post-wrap">
			<div class="row-fluid">
				<div id="content" class="span8 center-col">
					<div class="post clearfix" id="post-<?php the_ID(); ?>">
						<div class="skepost" dir="rtl" lang="ar">
							<h1 class="title"><?php the_title(); ?> </h1>
							
							<?php the_content(); ?>
					
							<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages :','advertica-lite').'</strong>','after' => '</p>', __('number','advertica-lite'),));	?>
						</div>
					<!-- skepost --> 
					</div>
					<!-- post -->
					<?php edit_post_link( __('Edit', 'advertica-lite') , '', ''); ?>
					<?php if ( comments_open() || get_comments_number() ) {
						comments_template();
					} ?>
					<?php endwhile; ?>
					<?php else :  ?>
						<div class="post">
							<h2><?php _e('Page Does Not Exist','advertica-lite'); ?></h2>
						</div>
					<?php endif; ?>
						<div class="clearfix"></div>
				</div>
				<!-- content -->

				<!-- Sidebar -->
				
				<!-- Sidebar --> 
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>