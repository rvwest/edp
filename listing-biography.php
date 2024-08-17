<?php
/**
 * The custom template in child theme for displaying Guest Author's biography: Using Co-Author Plus plugin. content-single.php has also been modified from line 42-51.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

if ( function_exists( 'coauthors_posts_links' ) ) {
    global $post;
        $author_id=$post->post_author;
        foreach( get_coauthors() as $coauthor ): ?>
            <div class="author-info ">
                <div class="author-avatar">
                <?php echo get_avatar( $coauthor->user_email, '300', '', '', array( 'style' => '' ) ); ?>
                </div><!-- .author-avatar -->

                <div class="author-description">

                    <p class="author-bio">
                        <?php echo $coauthor->description; ?><br/>
                    </p><!-- .author-bio -->
                </div><!-- .author-description -->

            </div><!-- .author-info -->

        <?php endforeach;
}
?>
