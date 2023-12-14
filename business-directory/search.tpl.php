<!--search.tpl.php-->
<div id="wpbdp-search-page" class="wpbdp-search-page businessdirectory-search businessdirectory wpbdp-page <?php echo $_class; ?>">
	<?php if ( ! $form_only ) : ?>
		<!--<div class="wpbdp-bar cf"><?php wpbdp_the_main_links(); ?></div>-->
	<?php endif; ?>
	<div class="wpbdp-main-box">
		<div class="main-fields search-block box-row cols-2">
	<form action="<?php echo esc_url( $search_url ); ?>" method="get">
		<input type="hidden" name="wpbdp_view" value="search" />
		<?php echo $hidden_fields; ?>
		<?php if ( ! wpbdp_rewrite_on() ) : ?>
		<input type="hidden" name="page_id" value="<?php echo wpbdp_get_page_id(); ?>" />
		<?php endif; ?>
		<div class="box-col search-fields">
			<div class="box-row cols-<?php echo $no_cols; ?>">
				<div class="box-col main-input">
					<label for="wpbdp-main-box-keyword-field" style="display:none;">Keywords:</label>
					<input type="text" id="wpbdp-main-box-keyword-field" title="Quick search keywords" class="keywords-field" name="kw" placeholder="<?php esc_attr_e( 'Search Listings', 'business-directory-plugin' ); ?>" />
					<svg class="svgicon svgicon--search search__input-control-icon-svg" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.164 10.133L16 14.97 14.969 16l-4.836-4.836a6.225 6.225 0 01-3.875 1.352 6.24 6.24 0 01-4.427-1.832A6.272 6.272 0 010 6.258 6.24 6.24 0 011.831 1.83 6.272 6.272 0 016.258 0c1.67 0 3.235.658 4.426 1.831a6.272 6.272 0 011.832 4.427c0 1.422-.48 2.773-1.352 3.875zM6.258 1.458c-1.28 0-2.49.498-3.396 1.404-1.866 1.867-1.866 4.925 0 6.791a4.774 4.774 0 003.396 1.405c1.28 0 2.489-.498 3.395-1.405 1.867-1.866 1.867-4.924 0-6.79a4.774 4.774 0 00-3.395-1.405z"></path></svg>
				</div>
				<?php echo $extra_fields; ?>

			</div>
		</div>
		<div class="box-col submit-btn">
			<input type="submit" value="<?php echo esc_attr_x( 'Search', 'main box', 'business-directory-plugin' ); ?>" /><br />
		</div>
	</form>
		</div>
</div>
<div class="wpbdp-add-your-own"><i class="far fa-book"></i> <a href="https://docs.google.com/forms/d/e/1FAIpQLSeeHm-OYkTotMzt99GuAbgP-j1rZBl3n54kPz4e-BWZDtz-Lg/viewform?usp=sf_link">Add your own thesis</a></div>
	<?php if ( 'none' === $search_form_position || 'above' === $search_form_position ) : ?>
		<?php echo $search_form; ?>
	<?php endif; ?>


	<?php if ( $searching ) : ?>
		<h3><?php echo esc_html__( 'Results', 'business-directory-plugin' ) . ' (' . esc_html( $count ) . ')'; ?>
		<!--<?php if ( 'none' === $search_form_position ) : ?>
			<?php
			$return_url = wpbdp_get_var( array( 'param' => 'return_url' ), 'request' );
			if ( empty( $return_url ) ) :
				$return_url = wpbdp_get_page_link( 'search' );
			endif;
			?>
			<a class="wpbdp-no-bold wpbdp-smaller" href="<?php echo esc_url( $return_url ); ?>">
				<?php esc_html_e( 'Search Again', 'business-directory-plugin' ); ?>
			</a>
		<?php endif; ?>-->
		<a href="<?php echo esc_url( wpbdp_get_page_link( 'main' ) ); ?>"><i class="far fa-times"></i></a>
		</h3>
		<?php if ( $results ) : ?>
			<div class="search-results">
			<?php echo $results; ?>
			</div>
		<?php else : ?>
			<p><?php esc_html_e( 'No listings found.', 'business-directory-plugin' ); ?></p>
		<?php endif; ?>
	<?php endif; ?>

	<?php if ( 'below' === $search_form_position ) : ?>
		<?php echo $search_form; ?>
	<?php endif; ?>
</div>
