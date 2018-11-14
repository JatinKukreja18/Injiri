<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Injiri_Theme
 */

?>
<div class= "col-lg-5 col-sm-5">
				
<?php if ( get_post_gallery() ) {
		
		$gallery        = get_post_gallery( get_the_ID(), false );
		$galleryIDS     = $gallery['ids'];
		$pieces         = explode(",", $galleryIDS);
		$first_image_full = wp_get_attachment_image_src( $pieces[0], 'full'); 
		?>
	<div class="placeholder-image-block clothing">
		<img id="SelectedThumbnail" src="<?php echo $first_image_full[0] ?>"/>
	</div>
		<?php }
		?>
				<!-- // get_template_part( 'template-parts/content', get_post_type() ); -->
				</div>
<div class= "col-lg-3 col-sm-3 offset-1">
	<h3>
			<?php previous_post_link(); ?> 
		<?php the_title(); ?>
			<?php next_post_link(); ?>
	</h3>
	<p class="injiri-description">  <?php echo wp_strip_all_tags(strip_shortcodes(get_the_content())); ?> </p>				
	<?php if ( get_post_gallery() ) {
		
		$gallery        = get_post_gallery( get_the_ID(), false );
		$galleryIDS     = $gallery['ids'];
		$pieces         = explode(",", $galleryIDS);
		$first_image_full = wp_get_attachment_image_src( $pieces[0], 'full'); 
		?>
	<div class="collection-gallery-wrapper clothing" >
		<?php foreach ($pieces as $key => $value ) { 
			$image_medium   = wp_get_attachment_image_src( $value, 'medium'); 
			$image_thumbnail   = wp_get_attachment_image_src( $value, 'thumbnail'); 
			$image_full     = wp_get_attachment_image_src( $value, 'full'); 
		?>
			<a class="collection-gallery-item <?php if($key ==0) echo 'active' ?>" onClick="changeImage('<?php echo $image_medium[0] ?>','<?php echo $image_full[0] ?>',this)" rel="lightbox">
				<img class="collection-gallery-item-image" src="<?php echo $image_thumbnail[0] ?>"/>
			</a>
		<?php } ?>
	</div>
		<?php } ?>
</div>
				
