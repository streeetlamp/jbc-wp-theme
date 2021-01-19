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
	if (have_rows('flexible_content')) :
		while (have_rows('flexible_content')) :
			the_row();
			get_template_part('inc/flex-content-loop');
		endwhile;
	endif;

	if (is_front_page()) :
	?>
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
	endif;
	wp_reset_postdata();
	?>

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
	wp_reset_postdata();

if( have_rows('home_featured_posts', 'options') ):
		echo("<div class='home-featured-wrap'>");
    while( have_rows('home_featured_posts', 'options') ) : the_row();
				$headline = get_sub_field('headline');
        $description = get_sub_field('description');
        // $featured = get_sub_field('post_feature');
				// echo(print_r($featured, true));
				echo("<div class='home-featured-cat'>");
					echo ("<h4>".$headline."</h4>");
					echo ("<small>".$description."</small>");
				echo("</div>");
    endwhile;
		echo("</div>");
endif;
?>


</main><!-- #main -->

<?php
get_sidebar();
get_footer();
