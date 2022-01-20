<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sato
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="min-h-screen">

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="https://gmpg.org/xfn/11">
        <script src="https://cdn.tailwindcss.com"></script>
        <?php wp_head(); ?>
    </head>

    <body class="min-h-screen">
        <?php wp_body_open(); ?>
        <div id="page" class="site min-h-screen flex flex-col">
            <a class="skip-link screen-reader-text"
                href="#primary"><?php esc_html_e( 'Skip to content', 'sato' ); ?></a>

            <header id="masthead" class="site-header p-4">
                <div class="site-branding">
                    <?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
                    <h1 class="site-title text-4xl"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                            rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php
			else :
				?>
                    <p class="site-title text-4xl"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                            rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php
			endif;
			$sato_description = get_bloginfo( 'description', 'display' );
			if ( $sato_description || is_customize_preview() ) :
				?>
                    <p class="site-description text-lg mt-2 mb-4">
                        <?php echo $sato_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    </p>
                    <?php endif; ?>
                </div><!-- .site-branding -->

                <nav id="site-navigation" class="main-navigation">
                    <button class="menu-toggle" aria-controls="primary-menu"
                        aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'sato' ); ?></button>
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
