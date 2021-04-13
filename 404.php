<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package James_Branch_Cabell
 */

get_header();
?>

<main id="primary" class="site-main">

	<section class="error-404 not-found">
		<header class="page-header">
			<h1 class="page-title"><?php esc_html_e( 'Uh Oh. Something is missing :(', 'jbc-wp-theme' ); ?></h1>
		</header><!-- .page-header -->

		<article id="post-151" class="page type-page status-publish hentry">
			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'jbc-wp-theme' ); ?></p>

				<?php
				the_widget( 'WP_Widget_Tag_Cloud' );
				?>

			</div><!-- .page-content -->
		</article>

	</section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();
