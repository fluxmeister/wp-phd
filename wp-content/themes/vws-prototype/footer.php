<?php
/*  VWS Prototype Theme's Footer
	Copyright: 2021, FluxMeister
*/
?>




</div> <!-- conttainer -->
<div id="footer">

<?php
   	get_sidebar( 'footer' );
?>
</div> <!-- footer -->

<div id="creditline"><?php echo '&copy; ' . date("Y"). ': ' . get_bloginfo( 'name' ) . '  '; travel_creditline(); ?></div>

<?php wp_footer(); ?>
</body>
</html>