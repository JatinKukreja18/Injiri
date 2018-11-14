<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Injiri_Theme
 */

?>
<div class= "col-lg-6 col-sm-6">
				
<?php if ( get_post_gallery() ) {
		
		$gallery        = get_post_gallery( get_the_ID(), false );
		$galleryIDS     = $gallery['ids'];
		$pieces         = explode(",", $galleryIDS);
		$first_image_full = wp_get_attachment_image_src( $pieces[0], 'full'); 
		?>
	<div class="placeholder-image-block">
		<img class="placeholder-image" src="<?php echo(get_template_directory_uri());?>/images/placeholder.jpg"/>				
		<img id="SelectedThumbnail" src="<?php echo $first_image_full[0] ?>"/>
	</div>
	<span class="collection-gallery-arrows left" onClick="scrollImages(0)"></span>
	<span class="collection-gallery-arrows right" onClick="scrollImages(1)"></span>
	<div class="collection-gallery-wrapper" >
		<?php foreach ($pieces as $key => $value ) { 

			$image_medium   = wp_get_attachment_image_src( $value, 'medium'); 
			$image_thumbnail   = wp_get_attachment_image_src( $value, 'thumbnail'); 
			$image_full     = wp_get_attachment_image_src( $value, 'full'); 
		?>

			<a class="collection-gallery-item <?php if($key ==0) echo 'active' ?>" onClick="changeImage('<?php echo $image_medium[0] ?>','<?php echo $image_full[0] ?>',this)" rel="lightbox">
				<img class="collection-gallery-item-image" src="<?php echo $image_thumbnail[0] ?>"/>
			</a>
		<?php } ?>
		
			<!-- // disabling comments
			// // If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) :
			// 	comments_template();
			// endif; -->

	</div>
		<?php }
		?>
				<!-- // get_template_part( 'template-parts/content', get_post_type() ); -->
				</div>
				<div class= "col-lg-2 col-sm-2 offset-1">
					 <h3>
						 <?php previous_post_link(); ?> 
					 	<?php the_title(); ?>
						 <?php next_post_link(); ?>
					</h3>
					 <p class="injiri-description">  <?php echo wp_strip_all_tags(strip_shortcodes(get_the_content())); ?> </p>
					
</div>
				
