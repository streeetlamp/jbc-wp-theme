<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package James_Branch_Cabell
 */

?>

<footer id="colophon" class="site-footer">
	<div class="info-footer">
		<nav id="footer-nav" class="footer-navigation">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer',
					'menu_id'        => 'footer',
				)
			);
			?>
		</nav><!-- #site-navigation -->
		<?php
		if (shortcode_exists('jetpack_subscription_form')) {
			echo do_shortcode('[jetpack_subscription_form title="Subscribe for Updates" subscribe_text="Enter your email address to subscribe and receive notifications of new updates by email."]');
		}

		if ( get_the_modified_time( 'U' ) > get_the_time( 'U' ) ) : ?>
			<p class="last-modified"><small>Last modified: <?php the_modified_time('F j, Y'); ?></small></p>
		<?php else : ?>
			<p class="last-modified"><small>Last modified: <?php echo date('F j, Y'); ?></small></p>
		<?php endif; ?>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>