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
			<div class="row" style="align-items:flex-start">
				<div class= "col-lg-3 col-sm-3">
				</div>
			<?php
				while ( have_posts() ) :
					the_post();
					?> 
				<?php $terms = get_the_terms( $post->ID, 'type' );
				if ( !empty( $terms ) ){
					// get the first term
					$term = array_shift( $terms );
					if($term->slug == 'clothing'){
						get_template_part('template-parts/content','clothing');
					}else{
						get_template_part('template-parts/content','collection-default');
					}
				} ?>
				
					<?php
			endwhile; // End of the loop.
			?>
			</div>
		

		</main><!-- #main -->
	</div><!-- #primary -->
	<script>
		function changeImage(caption,smallImage,largeImage,selected){
			removeActiveLinks();	
			document.querySelector("#SelectedThumbnail").src = smallImage;
			setTimeout(() => {
				document.querySelector("#SelectedThumbnail").src = largeImage;			
			}, 0);
			document.querySelector("#injiri-caption").textContent = caption;
			document.querySelector("#injiri-caption-mobile").textContent = caption;
			selected.classList.add('active');
		}
		
		function removeActiveLinks(type){
			let allLinks = document.querySelectorAll(".collection-gallery-item");
			for(let i=0; i < allLinks.length ; i++){
				allLinks[i].classList.remove('active')
			}
		}
		function scrollImages(value){
			let offset = document.querySelector('.collection-gallery-wrapper').scrollLeft
			if(value){
				document.querySelector('.collection-gallery-wrapper').scrollTo(offset + 50,0)
			}else{
				document.querySelector('.collection-gallery-wrapper').scrollTo(offset -50,0)
			}
		}
		var checkForArrows = function () {
			if(document && document.querySelector('.collection-gallery-wrapper')){
				if(document.querySelector('.collection-gallery-wrapper').clientWidth < document.querySelector('.collection-gallery-wrapper').scrollWidth){
					document.querySelectorAll('.collection-gallery-arrows')[0].classList.add('active');
					document.querySelectorAll('.collection-gallery-arrows')[1].classList.add('active');
				}	
				else{
					if(document.querySelector('.collection-gallery-arrows')){
						document.querySelector('.collection-gallery-arrows').classList.remove('active');
					}
				}
			}
		};

		
		// document.querySelector(".collection-gallery-wrapper").addEventListener("load",checkForArrows)
		// if ( !!(window.addEventListener) )
		// window.addEventListener("DOMContentLoaded", checkForArrows)
		// else // MSIE
		// window.attachEvent("onload", checkForArrows)
		window.onload = function(){
			checkForArrows();
		}
		window.onresize = function(event) {
			checkForArrows();
		};
	</script>
<?php
get_footer();
