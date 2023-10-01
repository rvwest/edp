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


<div class="span8">
<p class="foot-message">
	<a href="https://twitter.com/edpsyuk"><i class="fab fa-twitter"></i></a> | 
	<a href="https://threads.net/edpsyuk" style="vertical-align: middle;" ><img height="22px"  src="<?php echo get_template_directory_uri(); ?>/images/threads.svg" class="footer-img-svg"></i></a> | 
	<a href="https://www.linkedin.com/company/edpsy/about/"><i class="fab fa-linkedin"></i></a> |	
	<a href="https://www.facebook.com/edpsy.org.uk/"><i class="fab fa-facebook"></i></a> |
	<a href="mailto:hello@edpsy.org.uk"><i class="fal fa-envelope"></i> hello@edpsy.org.uk</a></p>
<p class="foot-message"><a href="/about/">Find out more about us</a><br/>Spotted something wrong? <a href="mailto:hello@edpsy.org.uk">let us know</a></p>
<p class="foot-message"><a href="/community-guidelines">Community guidelines</a> | <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">Reusing our content</a> | <a href="/cookies">Cookies and privacy</a></p>
</div>
<div class="span4 foot-message footer-accreditation">
<a href="https://ecologi.com/edpsyltd" target="_blank" rel="noopener noreferrer" title="View our Ecologi profile" style="width:200px;display:inline-block;">
  <img alt="We offset our carbon footprint via Ecologi" src="https://api.ecologi.com/badges/cpw/60292431878cf1001cb5ce58?white=true&landscape=true" style="width:200px;" />
</a>
</div>
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




<p class="legal-message"><span>edpsy ltd </span><span>Piccadilly Business Centre, Aldow Enterprise Park, Manchester, England, M12 6AE</span><span>Company number: 12669513 (registered in England and Wales)</span></p>


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
