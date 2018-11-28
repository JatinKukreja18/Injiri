<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Injiri_Theme
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main injiri-wrapper">
		<div class="row" >
				<div class= "col-lg-3 col-sm-3">
				</div>
				<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content-technique', get_post_type() );

					endwhile; // End of the loop.
					?>
				</div>
				
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
