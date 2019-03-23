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
				<div class= "col-lg-3 ">
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
		var imageIndex = 0;
		function changeMainImage(value){
			console.log(imageIndex);
			if(value == 1){
				if(imageIndex != parseInt(totalGalleryImages) - 1 ){
					const newValue = imageIndex + value;
					newValueItem = document.querySelector(".collection-gallery-item.collection-gallery-item-" + newValue);
					if(newValue !==	 -1 && newValueItem){
						document.querySelector("#SelectedThumbnail").src = newValueItem.dataset.imageValue;
						newValueItem.classList.add("active")
						document.querySelector(".collection-gallery-item.collection-gallery-item-" + imageIndex).classList.remove("active")
						imageIndex = newValue;
					}
				}
				else{
					const newValue = 0;
					newValueItem = document.querySelector(".collection-gallery-item.collection-gallery-item-" + newValue);
					if(newValue !==	 -1 && newValueItem){
						document.querySelector("#SelectedThumbnail").src = newValueItem.dataset.imageValue;
						newValueItem.classList.add("active")
						document.querySelector(".collection-gallery-item.collection-gallery-item-" + imageIndex).classList.remove("active")
						imageIndex = newValue;
					}
				}
			}
			else if(value == -1){
				if(imageIndex != 0){
					const newValue = imageIndex + value;
					newValueItem = document.querySelector(".collection-gallery-item.collection-gallery-item-" + newValue);
					if(newValue !==	 -1 && newValueItem){
						document.querySelector("#SelectedThumbnail").src = newValueItem.dataset.imageValue;
						newValueItem.classList.add("active")
						document.querySelector(".collection-gallery-item.collection-gallery-item-" + imageIndex).classList.remove("active")
						imageIndex = newValue;
					}
				}
				else{
					const newValue = parseInt(totalGalleryImages) - 1;
					newValueItem = document.querySelector(".collection-gallery-item.collection-gallery-item-" + newValue);
					if(newValue !==	 -1 && newValueItem){
						document.querySelector("#SelectedThumbnail").src = newValueItem.dataset.imageValue;
						newValueItem.classList.add("active")
						document.querySelector(".collection-gallery-item.collection-gallery-item-" + imageIndex).classList.remove("active")
						imageIndex = newValue;
					}
				}
			}

		}
		function changeImage(caption,smallImage,largeImage,selected,index){
			imageIndex = index;
			removeActiveLinks();	
			document.querySelector("#SelectedThumbnail").src = smallImage;
			let isSmall = true;
			document.querySelector("#SelectedThumbnail").onload = function(){
				if(isSmall){
					document.querySelector("#SelectedThumbnail").src = largeImage;
					isSmall = false;	
				}
				console.log(document.querySelector("#SelectedThumbnail").complete)		
			}
			
			
			if(document.querySelector("#injiri-caption")) document.querySelector("#injiri-caption").textContent = caption;
			if(document.querySelector("#injiri-caption-mobile")) document.querySelector("#injiri-caption-mobile").textContent = caption;
			selected.classList.add('active');
			console.log("changed")
			if(document.querySelector('html').clientWidth < 769){
				if(document.querySelector('html').scrollTop) document.querySelector('html').scrollTop = document.querySelector('.placeholder-image-block').offsetTop - 20	;
				if(document.querySelector('body').scrollTop) document.querySelector('body').scrollTop = document.querySelector('.placeholder-image-block').offsetTop - 20	;
			}
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
			if(document && document.querySelector('.collection-gallery-wrapper.home-textiles')){
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
