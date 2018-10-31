<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Injiri_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<title>INJIRI</title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Gentium+Basic" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Assistant:300,400,700" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'injiri-theme' ); ?></a>

	<header>
		<div class="menulogoContainer homeHeader">
			<div class="logoContainer">
                <div>
                    
                
			<?php
			the_custom_logo();
			
			
			?>
			</div>

		</div><!-- .site-branding -->
		<?php
		wp_nav_menu( array(
			'theme_location' => 'menu-1',
			'menu_id'        => 'primary-menu',
			'menu_class' => 'menus'
		) );
		?>
		<!-- #site-navigation -->
		</div>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
