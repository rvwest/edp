<?php get_header(); ?>


<?php  if( get_theme_mod('home_promo_sec', 'on') == 'on' ) { ?>
<?php include("includes/front-promo-section.php"); ?><?php } ?>

<!-- BLOG SECTION -->
<?php  if( get_theme_mod('home_blog_sec', 'on') == 'on' ) { ?>
<div id="front-content-box" class="skt-section block--blog">
	<div class="container">
		<div class="row-fluid">
			<h2 class="inline-border"><a href="/blog/"><?php echo wp_kses_post( get_theme_mod('home_blog_title', __('Blog', 'advertica-lite') ) ); ?></a></h2>

		</div>
		<div id="front-blog-wrap" class="row-fluid">
		<?php $advertica_blogno = esc_attr( get_theme_mod('home_blog_num', '3') );
		if( !empty($advertica_blogno) && ($advertica_blogno > 0) ) {
				$advertica_lite_latest_loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => $advertica_blogno,'ignore_sticky_posts' => true, 'category_name' => 'blog' ) );
		}else{
			   $advertica_lite_latest_loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => -1,'ignore_sticky_posts' => true, 'category_name' => 'blog' ) );
		} ?>
			<?php if ( $advertica_lite_latest_loop->have_posts() ) : ?>

			<!-- pagination here -->

				<!-- the loop -->
				<?php while ( $advertica_lite_latest_loop->have_posts() ) : $advertica_lite_latest_loop->the_post(); ?>
					<div class="span4 blog-posts"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

<?php if ( has_post_thumbnail() ) : ?>

<?php if ( has_post_thumbnail() ) {the_post_thumbnail('edpsy_loop_img');} ?>


<?php endif; ?><h3><?php the_title(); ?></h3>
					</a></div>
				<?php endwhile; ?>
				<!-- end of the loop -->

				<!-- pagination here -->

<?php

$posts = get_posts(array('category_name' => 'blog'));
if(count($posts) >= 4)
{?>
    <p class="front-section-extra"><a href="/blog/" >See more blog posts</a></p>
<?php } ?>


				<?php wp_reset_postdata(); ?>

			<?php else : ?>
				<p><?php _e( 'Sorry, we don&#039;t have any blog posts at the moment.', 'advertica-lite' ); ?></p>
			<?php endif; ?>
		</div>
 	</div>
</div>
<?php } ?>
<!-- END BLOG SECTION -->

<!-- FEATURES SECTION -->
<?php  if( get_theme_mod('home_feat_sec', 'on') == 'on' ) { ?>
<div id="front-content-box" class="skt-section block--features">
	<div class="container">
		<div class="row-fluid">
			<h2 class="inline-border"><a href="/features/"><?php echo wp_kses_post( get_theme_mod('home_feat_title', __('Features', 'advertica-lite') ) ); ?></a></h2>

		</div>
		<div id="front-blog-wrap" class="row-fluid">
		<?php $advertica_featno = esc_attr( get_theme_mod('home_feat_num', '3') );
		if( !empty($advertica_featno) && ($advertica_featno > 0) ) {
				$advertica_lite_latest_loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => $advertica_featno,'ignore_sticky_posts' => true, 'category_name' => 'features' ) );
		}else{
			   $advertica_lite_latest_loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => -1,'ignore_sticky_posts' => true, 'category_name' => 'features' ) );
		} ?>
			<?php if ( $advertica_lite_latest_loop->have_posts() ) : ?>

			<!-- pagination here -->

				<!-- the loop -->
				<?php while ( $advertica_lite_latest_loop->have_posts() ) : $advertica_lite_latest_loop->the_post(); ?>
					<div class="span4 feature-posts"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

<?php if ( has_post_thumbnail() ) : ?>

<?php if ( has_post_thumbnail() ) {the_post_thumbnail('edpsy_loop_img');} ?>


<?php endif; ?><h3><?php the_title(); ?></h3>




					</a></div><div class="span8 feature-posts quote-block">
				  <div class="quote"><a href="/features/2016/acceptance-and-commitment-therapy-with-anxious-students/" title="Test post – only feature"><span class="big-quote-mark qu-l">&#8220;</span>What I’d like you to do is take the thought and sing it to the tune of happy birthday.<span class="big-quote-mark qu-r">&#8221;</span></a></div>
					</div>
				<?php endwhile; ?>
				<!-- end of the loop -->


				<!-- pagination here -->
<p class="front-section-extra">
<?php
$posts = get_posts(array('category_name' => 'features'));
if(count($posts) >= 4)
{?>



    <a href="/features/" >See more feature articles</a>
<?php } ?>&nbsp;</p>

				<?php wp_reset_postdata(); ?>

			<?php else : ?>
				<p><?php _e( 'Sorry, we don&#039;t have any features at the moment.', 'advertica-lite' ); ?></p>
			<?php endif; ?>
		</div>
 	</div>
</div>
<?php } ?>

<!-- END FEATURES SECTION -->

<!-- TRAINEE SECTION -->
<?php  if( get_theme_mod('home_feat_sec', 'on') == 'on' ) { ?>
<div id="front-content-box" class="skt-section block--training">
	<div class="container">
		<div class="row-fluid">
			<h2 class="inline-border"><a href="/ep-training">Training to be an EP</a></h2>

		</div>
		<div id="front-blog-wrap" class="row-fluid">

									<div class="span3 training-posts">

							<a href="/ep-training/in-england">
<img src="<?php echo get_template_directory_uri().'/images/training-england.jpg'; ?>" width="100%">
								<h3 >England</h3>
					</a></div>
									<div class="span3 training-posts"><a href="/ep-training/in-northern-ireland">


<img src="<?php echo get_template_directory_uri().'/images/training-ni.jpg'; ?>" width="100%">
<h3>Northern Ireland</h3>
					</a></div>
									<div class="span3 training-posts"><a href="/ep-training/in-scotland">



<img src="<?php echo get_template_directory_uri().'/images/training-scotland.jpg'; ?>" width="100%">
<h3>Scotland</h3>
					</a></div>
					<div class="span3 training-posts"><a href="/ep-training/in-wales">



<img src="<?php echo get_template_directory_uri().'/images/training-wales.jpg'; ?>" width="100%">
<h3>Wales</h3>
					</a>
					</div>
	<p>&nbsp;</p>



					</div>

 	</div>
</div>
<?php } ?>

<!-- END TRAINEE SECTION -->

<!-- AWESOME PARALLAX SECTION -->
<?php  if( get_theme_mod('home_parallax_sec', 'on') == 'on' ) { ?>
<?php include("includes/front-parallax-section.php"); ?><?php } ?>

<?php if ( 'page' == get_option( 'show_on_front' ) ) {  ?>




<!-- PAGE EDITER CONTENT -->
<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
		<div id="front-page-content" class="skt-section">
			<div class="container">
				<?php the_content(); ?>
			</div>
		</div>
	<?php endwhile; ?>
<?php endif; ?>
<?php } ?>



<!-- CLIENTS-LOGO SECTION
<?php include("includes/front-client-logo-section.php"); ?>
 -->

<?php get_footer(); ?>
