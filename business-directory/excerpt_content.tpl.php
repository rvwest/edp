<?php
/**
 * Listings excerpt content template 
 *
 * @package BDP/Themes/Default/Templates/Excerpt Content
 */

?>
<!--excerpt_content.tpl.php-->

    <div class="listing-title">
        <h3><?php echo $fields->title->raw; ?></h3>
		<?php echo $fields->subtitle->html; ?>
    </div>
    <div class="excerpt-content --wpbdp-hide-title">	    	
		<div class="listing-details">			
		<?php echo $fields->methodology->html; ?>	
		<div class="excerpt-name-year">
			<?php echo $fields->name->html; ?>&nbsp;-&nbsp; 
			<?php echo $fields->year->html; ?>
		</div>
		</div>
	</div>