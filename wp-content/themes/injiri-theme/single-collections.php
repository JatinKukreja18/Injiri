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
			<div class="row">
				<div class= "col-lg-3 col-sm-3">
				</div>
				<div class= "col-lg-6 col-sm-6">
			<?php
				while ( have_posts() ) :
				the_post(); ?> 
				
				<!-- // get_template_part( 'template-parts/content', get_post_type() ); -->
			
				
				<?php if ( get_post_gallery() ) {
					
					$gallery        = get_post_gallery( get_the_ID(), false );
					$galleryIDS     = $gallery['ids'];
					$pieces         = explode(",", $galleryIDS);
					$first_image_full = wp_get_attachment_image_src( $pieces[0], 'full'); 
					?>
				<img id="SelectedThumbnail" src="<?php echo $first_image_full[0] ?>"/>
				<div class="collection-gallery-wrapper">
					<?php foreach ($pieces as $key => $value ) { 

						$image_medium   = wp_get_attachment_image_src( $value, 'medium'); 
						$image_thumbnail   = wp_get_attachment_image_src( $value, 'thumbnail'); 
						$image_full     = wp_get_attachment_image_src( $value, 'full'); 
					?>

						<a class="collection-gallery-item <?php if($key ==0) echo 'active' ?>" onClick="changeImage('<?php echo $image_full[0] ?>',this)" rel="lightbox">
							<img class="collection-gallery-item-image" src="<?php echo $image_thumbnail[0] ?>"/>
						</a>
					<?php } ?>
				</div>
					<?php }?>
				

			<!-- // disabling comments
			// // If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) :
			// 	comments_template();
			// endif; -->

				</div>
				<div class= "col-lg-2 col-sm-2 offset-1">
					 <h3><?php previous_post_link(); ?> <?php the_title(); ?><?php next_post_link(); ?></h3>
					 <p class="injiri-description">  <?php echo wp_strip_all_tags(strip_shortcodes(get_the_content())); ?> </p>
					
				</div>
				<?php
		endwhile; // End of the loop.
		?>
			</div>
		

		</main><!-- #main -->
	</div><!-- #primary -->
	<script>
		function changeImage(value,selected){
			removeActiveLinks();	
			document.querySelector("#SelectedThumbnail").src = value;
			selected.classList.add('active');
		}
		
		function removeActiveLinks(type){
		let allLinks = document.querySelectorAll(".collection-gallery-item");
		for(let i=0; i < allLinks.length ; i++){
			allLinks[i].classList.remove('active')
		}
	}
	</script>
<?php
get_footer();
