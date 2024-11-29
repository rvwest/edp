<div <?php post_class('span8 has-post-thumbnail promo'); ?>>
	<a href="<?php echo do_shortcode(get_theme_mod('promo_url', '#')); ?>">
		<div class="hover-space">
			<img src="<?php echo do_shortcode(get_theme_mod('promo_image', get_template_directory_uri() . '/images/Parallax_Section_Image.jpg')); ?>"
				class="attachment-edpsy_loop_img size-edpsy_loop_img wp-post-image" alt="">
		</div>
		<h3><span class="promo-tag"><i class="far fa-star fa-sm"></i> Featured: </span>
			<?php echo do_shortcode(get_theme_mod('promo_content', 'The secret EP is coming')); ?></h3>

	</a>
</div>