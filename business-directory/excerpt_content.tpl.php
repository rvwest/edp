<?php
/**
 * Listings excerpt content template 
 *
 * @package BDP/Themes/Default/Templates/Excerpt Content
 */

?>
<!--excerpt_content.tpl.php-->

<a href="<?php the_permalink() ?>">
    <div class="listing-title">
        <h3><?php echo $fields->title->raw; ?></h3>
    </div>
    <div class="excerpt-content --wpbdp-hide-title">	    	
		<div class="listing-details">	
				<div class="wpbdp-field-display wpbdp-field wpbdp-field-value field-display field-value wpbdp-field-year wpbdp-field-meta wpbdp-field-type-textarea wpbdp-field-association-meta  ">
					
						<?php echo $fields->year->html; ?>
					
				</div>								
				<div class="wpbdp-field-display wpbdp-field wpbdp-field-value field-display field-value wpbdp-field-institution wpbdp-field-meta wpbdp-field-type-select wpbdp-field-association-meta  ">
					<?php echo $fields->institution->html; ?>
				</div>								
				<div class="wpbdp-field-display wpbdp-field wpbdp-field-value field-display field-value wpbdp-field-methodology wpbdp-field-meta wpbdp-field-type-checkbox wpbdp-field-association-meta  ">
				<?php echo $fields->methodology->html; ?>
				</div>			
		</div>
	</div>
<a>
