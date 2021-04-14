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
        <section class="hero" <?php if (is_front_page()) : $image = get_field('image'); ?>style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.25)), url('<?php echo $image['sizes']['large']; ?>');" <?php endif; ?>>
            <header id="masthead" class="site-header">
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
                    <h2 class="site-description">
                        <?php echo $jbc_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                        ?>
                    </h2>
                <?php endif;
                get_search_form();
                ?>
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
                <!--
                <ul class="social">
                    <li><span class="fab fa-facebook-square"></span></li>
                    <li><span class="fab fa-twitter"></span></li>
                    <li><span class="fab fa-instagram"></span></li>
                    <li><span class="fas fa-envelope-open-text"></span></li>
                    <li><span class="fas fa-donate"></span> Donate</li>
                </ul>
                -->
            </header><!-- #masthead -->
            <?php
            if (is_front_page()) :
                $excerpt = get_field('excerpt');
                $headline = get_field('headline'); ?>
                <div class="hero-text">
                    <h2 class="hero-text--heading"><?php echo $headline; ?></h2>
                    <p class="hero-text--desc"><?php echo $excerpt; ?></p>
                </div>
            <?php
            endif; ?>
        </section>