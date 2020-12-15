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
	<div class="site-info">
		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="footer" aria-expanded="false"><?php esc_html_e('Footer Menu', 'jbc'); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer',
					'menu_id'        => 'footer',
				)
			);
			?>
		</nav><!-- #site-navigation -->
		<p class="last-modified"><small>Last modified: <?php the_modified_time('F j, Y'); ?></small></p>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>