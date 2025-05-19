<?php get_header(); ?>


<!-- BLOG SECTION -->

<?php if (get_theme_mod('home_blog_sec', 'on') == 'on') { ?>
	<div id="front-content-box" class="skt-section block--blog">

		<div class="container">
			<div class="row-fluid">
				<h2 class="inline-border"><a
						href="/blog/"><?php echo wp_kses_post(get_theme_mod('home_blog_title', __('Blog', 'advertica-lite'))); ?></a>
				</h2>

			</div>
			<div id="front-blog-wrap" class="row-fluid">
				<?php if (get_theme_mod('home_promo_sec', 'on') == 'on') { ?>
					<?php include("includes/front-promo-section-2.php"); ?>
				<?php } ?>

				<?php
				$advertica_blogno = esc_attr(get_theme_mod('home_blog_num', '6'));
				$jobs = get_job_listings();
				if ($jobs->have_posts()) {
					$advertica_blogno--;
				}
				if (!empty($advertica_blogno) && ($advertica_blogno > 0)) {
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => $advertica_blogno * 3, // Fetch more than needed to allow for filtering
						'ignore_sticky_posts' => true,
						'category_name' => 'blog',
					);
				} else {
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => -1,
						'ignore_sticky_posts' => true,
						'category_name' => 'blog',
					);
				}
				$advertica_lite_latest_loop = new WP_Query($args);

				// Filter: only allow one post with category '5-things' in the loop, but always fill up to $advertica_blogno
				$filtered_posts = array();
				$found_5things = false;
				if ($advertica_lite_latest_loop->have_posts()) {
					foreach ($advertica_lite_latest_loop->posts as $post) {
						if (has_category('5-things', $post)) {
							if ($found_5things) {
								continue; // Skip additional 5-things posts
							} else {
								$found_5things = true; // Keep the first one
							}
						}
						$filtered_posts[] = $post;
						if (count($filtered_posts) >= $advertica_blogno) {
							break;
						}
					}
					$advertica_lite_latest_loop->posts = $filtered_posts;
					$advertica_lite_latest_loop->post_count = count($filtered_posts);
				} ?>
				<?php if ($advertica_lite_latest_loop->have_posts()): ?>

					<!-- pagination here -->

					<!-- the loop -->

					<?php while ($advertica_lite_latest_loop->have_posts()):
						$advertica_lite_latest_loop->the_post(); ?>
						<div <?php post_class('span4'); ?>><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<div class="hover-space">
									<?php if (has_post_thumbnail()): ?>

										<?php if (has_post_thumbnail()) {
											the_post_thumbnail('edpsy_loop_img');
										} ?>
									</div>

								<?php endif; ?>
								<h3>
									<?php if (in_category('features')) { ?>
										<span class="title-tag">Longer read: </span>
									<?php } ?>
									<?php the_title(); ?>
								</h3>

							</a></div>
						<?php if ($jobs->have_posts() && $advertica_lite_latest_loop->current_post == 2) {
							echo '<div class="span4 post type-post status-publish format-standard has-post-thumbnail hentry category-blog category-features tag-ep-work homepage-job-promo">';
							echo do_shortcode('[job_summary width="" align=""]');
							echo '</div>';
						} ?>
					<?php endwhile; ?>
					<!-- end of the loop -->

					<!-- pagination here -->

					<?php

					$posts = get_posts(array('category_name' => 'blog'));
					if (count($posts) >= 4) { ?>
						<p class="front-section-extra"><a href="/blog/">See more blog posts <i class="far fa-angle-right"></i></a>
						</p>
					<?php } ?>


					<?php wp_reset_postdata(); ?>

				<?php else: ?>
					<p><?php _e('Sorry, we don&#039;t have any blog posts at the moment.', 'advertica-lite'); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php } ?>
<!-- END BLOG SECTION -->



<!-- TRAINEE SECTION -->
<?php if (get_theme_mod('home_feat_sec', 'on') == 'on') { ?>
	<div id="front-content-box" class="skt-section block--training">
		<div class="container">
			<div class="row-fluid">
				<h2 class="inline-border"><a href="/ep-training">Training to be an EP</a></h2>

			</div>
			<div id="front-blog-wrap" class="row-fluid">

				<div class="span3 training-posts">

					<a href="/ep-training/in-england">
						<div class="hover-space"><img
								src="<?php echo get_template_directory_uri() . '/images/training-england-1.jpg'; ?>"
								width="100%" alt=""></div>
						<h3>England</h3>
					</a>
				</div>
				<div class="span3 training-posts"><a href="/ep-training/in-northern-ireland">


						<div class="hover-space"><img
								src="<?php echo get_template_directory_uri() . '/images/training-ni-1.jpg'; ?>" width="100%"
								alt=""></div>
						<h3>Northern Ireland</h3>
					</a></div>
				<div class="span3 training-posts"><a href="/ep-training/in-scotland">



						<div class="hover-space"><img
								src="<?php echo get_template_directory_uri() . '/images/training-scotland-1.jpg'; ?>"
								width="100%" alt=""></div>
						<h3>Scotland</h3>
					</a></div>
				<div class="span3 training-posts"><a href="/ep-training/in-wales">



						<div class="hover-space"><img
								src="<?php echo get_template_directory_uri() . '/images/training-wales-1.jpg'; ?>"
								width="100%" alt=""></div>
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
<?php if (get_theme_mod('home_parallax_sec', 'on') == 'on') { ?>
	<?php include("includes/front-parallax-section.php"); ?><?php } ?>

<?php if ('page' == get_option('show_on_front')) { ?>




	<!-- PAGE EDITER CONTENT -->
	<?php if (have_posts()): ?>
		<?php while (have_posts()):
			the_post(); ?>
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