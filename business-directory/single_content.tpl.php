<?php
/**
 * Listing detail view rendering template
 *
 * @package BDP/Templates/Single Content
 */

?>
<!--single_content.tpl.php-->

<?php echo $fields->subtitle->html; ?>
<?php echo $fields->name->html; ?>
<div class="wpbdp-year-inst-block">
<?php echo $fields->year->html; ?>
|
<?php echo $fields->institution->html; ?>
</div>
<div class="wpbdp-metadata-block">
<?php echo $fields->methodology->html; ?>
<?php echo $fields->participants->html; ?>
<?php echo $fields->data_collection->html; ?>
<?php echo $fields->data_analysis->html; ?>
</div>
<?php if ( $fields->full_text_thesis->html > "" | $fields->published_paper->html > "" | $fields->blog__news_story->html > "" | $fields->website->html > "" ) : ?>
    <h3>Further reading</h3>
    <ul>
<?php endif; ?>

<?php if ( $fields->full_text_thesis->html > "" ) : ?>
    <li>
        <a href="<?php echo $fields->full_text_thesis->raw; ?>">Full text thesis</a>
</li>
<?php endif; ?>


<?php if ( $fields->published_paper->html > "" ) : ?>
    <li>
        <a href="<?php echo $fields->published_paper->raw; ?>">Published paper</a>
</li>
<?php endif; ?>

<?php if ( $fields->blog__news_story->html > "" ) : ?>
    <li>
        <a href="<?php echo $fields->blog__news_story->raw; ?>">Blog / news story</a>
</li>
<?php endif; ?>
<li>
<?php if ( $fields->website->html > "" ) : ?>
    <?php echo $fields->website->html; ?>
</li>
<?php endif; ?>
</ul>

<h2>Abstract</h2>
<?php echo $fields->abstract->raw; ?>
<?php echo $fields->email->html; ?>
