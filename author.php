<?php
/**
* The template for displaying Author archive pages.
* Learn more: http://codex.wordpress.org/Template_Hierarchy
*/
get_header(); ?>

<div class="main-wrapper-item category-blog">
	<div class="bread-title-holder">
		<!--<div class="bread-title-bg-image full-bg-breadimage-fixed"></div>-->

		<div class="container">
			<div class="row-fluid">
				<?php  if( get_theme_mod('breadcrumb_sec', 'on') == 'on' ) {
						if ((class_exists('advertica_lite_breadcrumb_class'))) {$advertica_breadcumb->advertica_lite_custom_breadcrumb();}
					}
					?>
				<div class="container_inner clearfix title-w-bio span8 center-col">
				<h1 class="title author-title">
    <?php  
        $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

        if ($curauth) {
            echo __('Articles by ', 'advertica-lite');
            echo $curauth->first_name . ' ' . $curauth->last_name;
        }
    ?>
</h1>

				<!--	<p class="author-bio"> -->
						
				
		
				<?php get_template_part( 'author-archive-biography', get_post_format() ); ?>
						

				</div>
			</div>
		</div>


<!--	<div class="bread-title-holder">
		<div class="bread-title-bg-image full-bg-breadimage-fixed"></div>
		<div class="container">
			<div class="row-fluid">
				<div class="container_inner clearfix">
					<h1 class="title">
						<?php  $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
						<?php _e('Author Archives : ','advertica-lite'); echo $curauth->display_name;  ?>
					</h1>
					<?php  if( get_theme_mod('breadcrumb_sec', 'on') == 'on' ) {
						if ((class_exists('advertica_lite_breadcrumb_class'))) {$advertica_breadcumb->advertica_lite_custom_breadcrumb();}
					}
					?>
				</div>
			</div>
		</div>
	</div>-->
	<div class="container post-wrap">
		<div class="row-fluid">
			<div id="container" class="span8 center-col">
				<div id="content">
					<?php if(have_posts()) : ?>
					<?php while(have_posts()) : the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
					<?php endwhile; ?>
					<?php
						$prev_link = get_previous_posts_link('&larr;Previous');
						$next_link = get_next_posts_link('Next&rarr;');
						if($prev_link || $next_link){
						?>
						<div class="navigation blog-navigation">
							<div class="alignleft"><?php previous_posts_link(__('&larr;Previous','advertica-lite')) ?></div>
							<div class="alignright"><?php next_posts_link(__('Next&rarr;','advertica-lite'),'') ?></div>
						</div>
						<?php
						}
					?>
					<?php else :  ?>
						<?php get_template_part( 'content', 'none' ); ?>
					<?php endif; ?>
				</div>
				<!-- content -->
			</div>
			<!-- container -->
			<!-- Sidebar -->
			<div id="sidebar" class="span3">
				<?php get_sidebar(); ?>
			</div>
			<!-- Sidebar -->
		</div>
	</div>
</div>
<?php get_footer(); ?>
