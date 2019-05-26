<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 */
?>
<div <?php post_class('post'); ?> id="post-<?php the_ID(); ?>">
		<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
        <div class="featured-image-shadow-box">
			<?php
					$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'advertica_standard_img');
			?>
			<a href="<?php the_permalink(); ?>" class="image">
				<img src="<?php echo $thumbnail[0];?>" alt="<?php the_title(); ?>" class="featured-image alignnon"/>
			</a>
		</div>
		<?php } ?>
		<?php if (in_category( 'features' )) { ?>
		<div class="side-tag">Longer read</div>
		<?php } ?>
        <h1 class="post-title">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_title(); ?>
			</a>
		</h1>

		<div class="skepost-meta clearfix">
		    <span class="date"><?php _e('On','advertica-lite');?> <?php the_time('F j Y') ?></span><?php _e(',','advertica-lite');?>
            <span class="author-name"><?php _e('by ','advertica-lite'); 							if ( function_exists( 'coauthors_posts_links' ) ) {
    coauthors_posts_links(first_name, last_name);
} else {
    the_author_posts_link(first_name, last_name);}?></span><?php if (has_category()) { ?><?php } ?><!-- <?php the_tags('<span class="tags">By ', ', ', '</span> ,'); ?>--><span class="comments"><?php comments_popup_link(__('','advertica-lite'), __(', 1 Comment ','advertica-lite'), __(', % Comments ','advertica-lite')) ; ?></span>
        </div>

		

		<!-- skepost-meta -->
        <div class="skepost clearfix">
			<?php the_excerpt(); ?>
			<!-- <div class="continue"><a href="<?php the_permalink(); ?>"><?php _e('Read More','advertica-lite');?></a></div>-->
        </div>
        <!-- skepost -->
</div>
<!-- post -->
