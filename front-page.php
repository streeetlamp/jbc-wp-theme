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

		<nav id="alt-nav" class="alternative-navigation">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'alt-nav',
					'menu_id'        => 'Alternative',
				)
			); ?>
		</nav><!-- #alt-navigation -->
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
	wp_reset_postdata();

	if (have_rows('home_featured_posts', 'options')) :
		echo ("<div class='home-featured-wrap trending'>");
		while (have_rows('home_featured_posts', 'options')) : the_row();
			$headline = get_sub_field('subheadline');
			$description = get_sub_field('description');
			$featured = get_sub_field('post_feature');
			$link = get_permalink($featured->ID);
			$title = $featured->post_title;
			echo ("<div class='home-featured-cat'>");
			echo ("<h5 style='margin:20px 0 0;'><small>" . $headline . "</small></h5>");
			echo ("<h4 style='margin:5px 0 15px;'><a href='" . $link . "'>" . $title . "</a></h4>");
			echo ("<small>" . $description . "</small>");
			echo ("</div>");
		endwhile;
		echo ("</div>");
	endif;
	?>


</main><!-- #main -->

<?php
get_sidebar();
get_footer();
