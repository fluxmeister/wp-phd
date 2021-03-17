<?php
/* 	VWS Prototype Theme's Right Sidebar Area
	Copyright: 2021, FluxMeister
*/
?>
<div id="right-sidebar">
<?php if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>

				<aside id="archives" class="widget">
					<h3 class="widget-title"><?php _e('Archives', 'travel-lite'); ?></h3>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget">
					<h3 class="widget-title"><?php _e('Meta', 'travel-lite'); ?></h3>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside>

<?php endif; // end sidebar widget area ?>
</div>