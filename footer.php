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
	<?php $contact_url = get_permalink( get_page_by_path( 'contact' ) ); ?>
	<div class="info-footer">
		<a class="footer-logo" href="https://library.vcu.edu"><img src="https://apps.library.vcu.edu/assets/public/images/bm_Libraries_RF_hz_4c_rev" alt="VCU Libraries logo"></a>
		<ul>
			<li>901 Park Ave., Box 842033</li>
			<li>Richmond, VA 23284-2033</li>
			<li>Toll-free: (844) 352-7399</li>
			<li>Local: (804) 828-1111</li>
			<li><a alt="Contact Us" href="<?php echo esc_html($contact_url)?>">Contact Us</a></li>
		</ul>
	<!--
		<nav id="footer-nav" class="footer-navigation">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer',
					'menu_id'        => 'footer',
				)
			);
			?>
		</nav>
		-->
		<!-- #site-navigation -->
		<ul class="footer-links">
			<li><a href="//www.vcu.edu/">Virginia Commonwealth University</a></li>
			<li><a href="//www.library.vcu.edu/about/guidelines/copyright-privacy/">Copyright &amp; Privacy</a></li>
			<li><a href="//www.library.vcu.edu/access/accessibility/">Accessibility</a></li>
			<li><a href="/sitemap/">Site Map</a></li>
			<li class="donate"><a href="//www.library.vcu.edu/about/giving/"><span class="fas fa-donate"></span> Give Now</a></li>
		</ul>
		<?php
		if ( shortcode_exists( 'jetpack_subscription_form' ) ) {
			echo do_shortcode( '[jetpack_subscription_form title="Subscribe for Updates" subscribe_text="Enter your email address to subscribe and receive notifications of new updates by email."]' );
		}

		if ( get_the_modified_time( 'U' ) > get_the_time( 'U' ) ) :
			?>
			<p class="last-modified"><small>Last modified: <?php the_modified_time( 'F j, Y' ); ?></small></p>
		<?php else : ?>
			<p class="last-modified"><small>Last modified: <?php echo esc_html( date( 'F j, Y' ) ); ?></small></p>
		<?php endif; ?>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
