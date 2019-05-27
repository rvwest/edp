<?php get_header(); ?> 


<div class="main-wrapper-item">
	<div class="bread-title-holder">
		<!--<div class="bread-title-bg-image full-bg-breadimage-fixed"></div>-->
		
		<div class="container">
			<div class="row-fluid">
				<?php  if( get_theme_mod('breadcrumb_sec', 'on') == 'on' ) {
						if ((class_exists('advertica_lite_breadcrumb_class'))) {$advertica_breadcumb->advertica_lite_custom_breadcrumb();}
					}
					?>
				<div class="container_inner clearfix">
					<h1 class="title">
						<?php printf('<span>' . single_cat_title( '', false ) . '</span>' );?> 	
					</h1>
					
				</div>
			</div>
		</div>
	</div>

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
							<div class="alignleft"><?php previous_posts_link(__('« Newer posts','advertica-lite')) ?></div>		
							<div class="alignright"><?php next_posts_link(__(' Older posts »','advertica-lite'),'') ?></div>    					
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
			
		 

		</div>
	</div>
</div>


<?php get_footer(); ?>