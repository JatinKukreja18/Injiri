<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Injiri_Theme
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main  injiri-wrapper">

			<section class="error-404 not-found offset-4 col-sm-6">
				<header class="page-header">
					<h1 style="font-weight:600;margin-bottom:28px;" class="page-title"><?php esc_html_e( 'Oops! This page can&rsquo;t be found.', 'injiri-theme' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<h2 style="line-height:1.2em;"><?php esc_html_e( 'It looks like you are trying to access a page that does not exist or has been removed.', 'injiri-theme' ); ?></h2>


					

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
