<?php
/**
* The template for displaying the footer.
*
* Contains footer content and the closing of the
* #main and #page div elements.
*
*/
?>
	<div class="clearfix"></div>
</div>
<!-- #main -->

<!-- #footer -->
<div id="footer">
	<div class="container">
		<div class="row-fluid">
			<div class="second_wrapper">
				<?php dynamic_sidebar( 'Footer Sidebar' ); ?>
				<div class="clearfix"></div>
			</div><!-- second_wrapper -->
		</div>
	</div>

	<div class="third_wrapper">
		<div class="container">
			<div class="row-fluid">



<p class="foot-message"><a href="https://twitter.com/edpsyuk"><i class="fab fa-twitter"></i> @edpsyuk</a> | <a href="mailto:hello@edpsy.org.uk"><i class="fal fa-envelope"></i> hello@edpsy.org.uk</a></p>
<p class="foot-message"><a href="/about/">Find out more about us</a><br/>Spotted something wrong? <a href="mailto:hello@edpsy.org.uk">let us know</a></p>


				<div class="clearfix"></div>
			</div>
		</div>
	</div><!-- third_wrapper -->
</div>
<div id="copyright">
	<div class="container">
		<div class="row-fluid">
			<div class="second_wrapper">
				<?php dynamic_sidebar( 'Footer Sidebar' ); ?>
				<div class="clearfix"></div>
			</div><!-- second_wrapper -->
		</div>
	</div>

	<div class="third_wrapper">
		<div class="container">
			<div class="row-fluid">



<p class="foot-message"><a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">Reusing our content</a> | <a href="/cookies">Cookies and privacy</a></p>


				<div class="clearfix"></div>
			</div>
		</div>
	</div><!-- third_wrapper -->
</div>
<!-- #footer -->

</div>
<!-- #wrapper -->
	<a href="JavaScript:void(0);" title="<?php _e('Back To Top', 'advertica-lite'); ?>" id="backtop"><i class="fas fa-chevron-up"></i></a>
	<?php wp_footer(); ?>
</body>
</html>
