<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package James_Branch_Cabell
 */

get_header();
?>
<main id="primary" class="site-main">

	<?php
	if (is_front_page()) :
		if (have_rows('flexible_content')) :
			while (have_rows('flexible_content')) :
				the_row();
				get_template_part('inc/flex-content-loop');
			endwhile;
		endif;
	endif;
	wp_reset_postdata();
	?>

	<nav id="alt-nav" class="alternative-navigation">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'alt-nav',
				'menu_id'        => 'Alternative',
			)
		);
		wp_reset_postdata(); ?>
	</nav><!-- #alt-navigation -->

	<?php
	if (is_front_page()) : ?>
		<?php
		$arg = array(
			'orderby'        => 'rand',
			'post_type'			=> 'quotes',
			"numberposts" => 1,
			"posts_per_page" => 1,
		);
		$the_query = new WP_Query($arg);
		if ($the_query->have_posts()) :
			while ($the_query->have_posts()) : $the_query->the_post(); ?>
				<div class="home-quote"><?php the_content() ?></div>
	<?php endwhile;
		endif;
	endif;
	wp_reset_postdata(); ?>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
