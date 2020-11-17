<?php
/**
 * The custom template in child theme for displaying Guest Author's biography: Using Co-Author Plus plugin. content-single.php has also been modified from line 42-51.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

$coauthor = (get_user_by('slug', $coauthor));

?>

<div class="author-info">
	<div class="author-avatar">
		<?php
		echo get_avatar( get_the_author_meta( 'user_email' ), '96' );
		?>
	</div><!-- .author-avatar -->

	<div class="author-description">

		<p class="author-bio span8">
			<?php the_author_meta( 'description' ); ?>
		</p><!-- .author-bio -->
	</div><!-- .author-description -->
</div><!-- .author-info -->