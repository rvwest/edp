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



<p class="foot-message"><a href="mailto:hello@edpsy.org.uk">Say hello</a><br/>
	or <a href="/about/">find out more about us</a></p>


				<div class="clearfix"></div>
			</div>
		</div>
	</div><!-- third_wrapper -->
</div>
<!-- #footer -->

</div>
<!-- #wrapper -->
	<a href="JavaScript:void(0);" title="<?php _e('Back To Top', 'advertica-lite'); ?>" id="backtop"></a>
	<?php wp_footer(); ?>
</body>
</html>
