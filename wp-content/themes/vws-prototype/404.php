<?php

/*  VWS Prototype Theme's 404 Error Page
	Copyright: 2021, FluxMeister
*/

get_header(); ?>

<div id="container">

<h1 class="page-title"><?php _e('Not Found', 'travel-lite'); ?></h1>
<h3 class="arc-src"><span><?php _e('Apologies, but the page you requested could not be found. Perhaps searching will help', 'travel-lite'); ?></span></h3>

<?php get_search_form(); ?>
<p><a href="<?php echo home_url(); ?>" title="Browse the Home Page">&laquo; <?php _e('Or Return to the Home Page', 'travel-lite'); ?></a></p><br /><br />
<h2 class="post-title-color"><?php _e('You can also Visit the Following. These are the Featured Contents', 'travel-lite'); ?></h2>
<div class="content-ver-sep"></div><br />
<?php get_template_part( 'featured-box' ); ?>
 
<?php get_footer(); ?>