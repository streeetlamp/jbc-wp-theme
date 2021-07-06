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

	<nav id="alt-nav" class="alt-nav">
		<!-- 
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'alt-nav',
				'menu_id'        => 'Alternative',
			)
		);
		?>
		 -->

		<div class="menu-alternative-nav-container">
			<ul class="menu" id="Alternative">
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>

	</nav><!-- #alt-navigation -->
	<?php
	$arg       = array(
		'orderby'        => 'rand',
		'post_type'      => 'quotes',
		'numberposts'    => 1,
		'posts_per_page' => 1,
	);
	$the_query = new WP_Query( $arg );
	if ( $the_query->have_posts() ) :
		while ( $the_query->have_posts() ) :
			$the_query->the_post();
			$quote           = get_field( 'quote' );
			$attribution_jbc = get_field( 'attribution_jbc' );
			$quote           = str_replace( array( '<p>', '</p>' ), '', $quote );
			$attribution_jbc = str_replace( array( '<p>', '</p>' ), '', $attribution_jbc );
			?>
			<div class="home-quote">
				<?php echo ( '<p class="frontpage-quote">' . $quote . '<br>' . $attribution_jbc . '</p>' ); ?>
			</div>
			<?php
	endwhile;
	endif;
	wp_reset_postdata();

	if ( have_rows( 'home_featured_posts', 'options' ) ) :
		echo ( "<section class='home-featured-wrap'>" );
		echo ( '<ul>' );
		while ( have_rows( 'home_featured_posts', 'options' ) ) :
			the_row();
			$headline    = get_sub_field( 'subheadline' );
			$description = get_sub_field( 'description' );
			$featured    = get_sub_field( 'post_feature' );
			$feat_link   = get_permalink( $featured->ID );
			$feat_title  = $featured->post_title;
			echo ( "<li class='home-featured-cat'>" );
			echo ( '<div>' );
			echo ( '<span>' . esc_html( $headline ) . '</span>' );
			echo ( "<h2><a href='" . esc_html( $feat_link ) . "'>" . esc_html( $feat_title ) . '</a></h2>' );
			echo ( '<p>' . esc_html( $description ) . '</p>' );
			echo ( '</div>' );
			echo ( '</li>' );
		endwhile;
		echo ( '</ul>' );
		echo ( '</section>' );
	endif;
	?>


</main><!-- #main -->

<?php
get_sidebar();
get_footer();
