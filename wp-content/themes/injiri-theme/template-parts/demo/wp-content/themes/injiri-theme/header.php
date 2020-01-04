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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Gentium+Basic:400,400i" rel="stylesheet">
	<!-- <link href="https://fonts.googleapis.com/css?family=Gentium+Basic" rel="stylesheet">
 -->
	<link href="https://fonts.googleapis.com/css?family=Assistant:300,400,600,700" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wptime-plugin-preloader"></div>
	<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'injiri-theme' ); ?></a>

	<header>
		
		<div  
		
			<?php
			if ( is_home() || is_front_page() ) :
				?>
				class="menulogoContainer injiri-header injiri-header-home  col-lg-2	"
				<?php
			endif;
			?>
				<?php

			if ( !is_home() && !is_front_page() ) :
				?>
				class="menulogoContainer injiri-header  col-lg-2"

			<?php
			endif;
			?>
			>
			<div class="logoContainer">
             
				<?php
					if ( is_home() || is_front_page() ) :
						?>
						<a href="<?php echo(get_home_url());?>" class="custom-logo-link   ">
							<img src="<?php echo(get_template_directory_uri());?>/images/logo-white.png" alt=""/>
						</a>						
						<?php
					endif;
					?>
						<?php

					if ( !is_home() && !is_front_page() ) :
						?>
						<a href="<?php echo(get_home_url());?>" class="custom-logo-link ">
									<img src="<?php echo(get_template_directory_uri());?>/images/logo-black.png" alt=""/>
						</a>

					<?php
					endif;
					?>
					<!-- <php
					the_custom_logo();
					> -->
					

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
		<div id="mobile-menu" onClick="toggleMenu()"class="hamContainer
		<?php if ( is_home() || is_front_page() ) :?>white<?php endif;?> ">
			<span class="hamLine hamFirst"></span>
			<span class="hamLine hamSecond"></span>
			<span class="hamLine hamThird"></span>
		</div>
	</header><!-- #masthead -->
	<div class="mobileMenusContainer <?php
			if ( is_home() || is_front_page() ) :?>dark<?php endif;?>
			<?php if ( !is_home() && !is_front_page() ) :?>light<?php endif; ?>
			">
	<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu-mobile',
				'menu_class' => 'menus'
			) );
			?>
	</div>
    <div class="overlay <?php
			if ( is_home() || is_front_page() ) :?>dark<?php endif;?>
			<?php if ( !is_home() && !is_front_page() ) :?>light<?php endif; ?>
			" onClick="toggleMenu()"></div>
	<script>
		function toggleMenu(){
			document.querySelector('.hamContainer').classList.toggle("animate");
			document.querySelector('.mobileMenusContainer').classList.toggle("open");
			document.querySelector('.overlay').classList.toggle("showOverlay");
			document.querySelector('body').classList.toggle("fixed");
			document.querySelector('html').classList.toggle("fixed");
		}
		// if(window.location.pathname.toString().indexOf("collections") != -1){
		// 	document.querySelector("#menu-item-187").classList.add("current-menu-item")
		// }

	</script>
	<!--  .content-margin-home  -->
	<div id="content" class="site-content  
    <?php if ( is_home() || is_front_page() ) :?>
		is-home-content
        <?php endif?>">