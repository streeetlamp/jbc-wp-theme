<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package James_Branch_Cabell
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script type="text/javascript" defer src="//branding.vcu.edu/bar/academic/latest.js" data-color-top-campaign="white"></script>
	<?php wp_head(); ?>
    <script type="text/javascript" src="//branding.vcu.edu/bar/academic/latest.js" data-color-top-campaign="graydark"></script>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'jbc-wp-theme' ); ?></a>
		<section class="hero"
		<?php
		if ( is_front_page() ) :
			$image = get_field( 'image' );
			$image = $image['sizes']['large'];
			?>
			style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.25)), url('<?php echo esc_sql( $image ); ?>');" <?php endif; ?>>
			<header id="masthead" class="site-header">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				endif;
				$jbc_description = get_bloginfo( 'description', 'display' );
				if ( $jbc_description || is_customize_preview() ) :
					?>
					<h2 class="site-description">
						<?php
						echo $jbc_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						?>
					</h2>
					<?php
				endif;
				get_search_form();
				?>
				<nav id="site-navigation" class="main-navigation">
					<i id="mobile-close" class="menu-close fas fa-times-circle"></i>
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fas fa-bars" style="padding-right:10px;"></i>Menu</button>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				</nav><!-- #site-navigation -->
			</header><!-- #masthead -->
			<?php
			if ( is_front_page() ) :
				$excerpt    = get_field( 'excerpt' );
				$headline   = get_field( 'headline' );
				$hero_link  = get_field( 'link' );
				$hero_title = 'Get Started';
				?>
				<div class="hero-text">
					<h2 class="hero-text--heading"><?php echo esc_html( $headline ); ?></h2>
					<p class="hero-text--desc"><?php echo esc_html( $excerpt ); ?></p>
					<?php
					if ( $hero_link ) :
						echo ( "<h3 class='hero-text--link'><a href='" . esc_url( $hero_link ) . "'>" . esc_html( $hero_title ) . '</a></h3>' );
					endif;
					?>
				</div>
				<?php
			endif;
			?>
		</section>
