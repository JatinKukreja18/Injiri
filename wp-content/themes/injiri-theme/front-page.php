<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Injiri_Theme
 */

get_header();
?>

	<div id="primary" class="content-area">
		
		<?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		<a class="mute-icon" onClick="toggle()">
			<img id="icon-unmute" src="<?php echo(get_template_directory_uri());?>/images/speaker.svg" >
			<img id="icon-mute" hidden src="<?php echo(get_template_directory_uri());?>/images/speaker-mute.svg" >
		</a>
		</main><!-- #main -->
	</div><!-- #primary -->
	<script>;
			var video=document.getElementById("home-video");
		function toggle(){
			video.muted = !video.muted;
			if(video.muted){
				document.querySelector("#icon-mute").hidden = true
				document.querySelector("#icon-unmute").hidden = false
			}
			else{
				document.querySelector("#icon-unmute").hidden = true
				document.querySelector("#icon-mute").hidden = false
			}
		}
		// window.onload = (function (oldOnLoad) {
		// 	return function () {
		// 	if (oldOnLoad) { 
		// 		olOnLoad();  //fire old Onload event that was attached if any.
		// 	}
		// 	// setTimeout(() => {
		// 	// 	video.muted = !video.muted;
		// 	// }, 1000);
		// 	}
		// })(window.onload);
	</script>
<?php
get_footer();
