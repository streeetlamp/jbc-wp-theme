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
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'jbc'); ?></a>

		<header id="masthead" class="site-header">
				<div class="site-branding">
					<?php
					the_custom_logo();
					if (is_front_page() && is_home()) :
					?>
						<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
					<?php
					else :
					?>
						<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
					<?php
					endif;
					$jbc_description = get_bloginfo('description', 'display');
					if ($jbc_description || is_customize_preview()) :
					?>
						<h2 class="site-description"><?php echo $jbc_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
																						?></h2>
					<?php endif;
					get_search_form();
					?>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Primary Menu', 'jbc'); ?></button>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					); ?>
				</nav><!-- #site-navigation -->
		</header><!-- #masthead -->
		<?php
		if (is_front_page()) : ?>
			<div class="slider slider-wrap slide-fade flex-row" data-autoplay="true" data-slidespeed="7500" data-slidedots="true">
				<div class="slider-list">
					<?php
					// vars
					$image = get_field('image');
					$excerpt = get_field('excerpt');
					$headline = get_field('headline');
					?>

					<div class="slide" style="background-image:url('<?php echo $image['sizes']['large']; ?>');">
						<?php if ($image) : ?>
							<div class="slide-excerpt-wrap">
								<div class="slide-inner">
									<h2 class="slide-headline"><?php echo $headline; ?></h2>
									<div class="slide-excerpt"><?php echo $excerpt; ?></div>
								</div>
							</div>
						<?php endif; ?>
					</div>


				</div>
			</div> <?php
						endif;
							?>