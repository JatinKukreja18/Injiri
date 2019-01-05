<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Injiri_Theme
 */

?>
<div class= "col-lg-5 col-sm-6">
	<!-- visible only on mobile -->
	<h3 class="post-links-header visible-mobile">
			<?php next_post_link('<span class="post-links-arrows left">%link</span>', '',TRUE,'','type'); ?>
			<span class="title"><?php the_title(); ?></span>
			<?php previous_post_link('<span class="post-links-arrows right">%link</span>', '',TRUE,'','type'); ?> 
	</h3>
	<p class="injiri-description visible-mobile" style="margin-bottom:23px;">  <?php echo wp_strip_all_tags(strip_shortcodes(get_the_content())); ?> </p>		

	<!-- visible only on mobile ends-->

<?php if ( get_post_gallery() ) {
		
		$gallery        = get_post_gallery( get_the_ID(), false );
		$galleryIDS     = $gallery['ids'];
		$pieces         = explode(",", $galleryIDS);
		$first_image_full = wp_get_attachment_image_src( $pieces[0], 'full'); 
		?>
	<div class="placeholder-image-block clothing">
		<img id="SelectedThumbnail" src="<?php echo $first_image_full[0] ?>"/>
	</div>
	<p class="injiri-caption hidden-mobile" style="margin:0px;" id="injiri-caption"></p>

		<?php }
		?>
				<!-- // get_template_part( 'template-parts/content', get_post_type() ); -->
				</div>
<div class= "col-lg-3 col-sm-4 offset-sm-2 offset-1 collection-info-container">
	<h3 class="post-links-header hidden-mobile">
			<?php next_post_link('<span class="post-links-arrows left">%link</span>', '',TRUE,'','type'); ?>
			<span class="title"><?php the_title(); ?></span>
			<?php previous_post_link('<span class="post-links-arrows right">%link</span>', '',TRUE,'','type'); ?> 
	</h3>
	<p class="injiri-description hidden-mobile">  <?php echo wp_strip_all_tags(strip_shortcodes(get_the_content())); ?> </p>		
			
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
			$caption = wp_get_attachment_caption($value)
		?>
		<script type="text/javascript">
			if("<?php echo $key ?>" == 0){
			const caption = "<?php echo wp_get_attachment_caption($value) ?>"
			setTimeout(() => {
				if(document.querySelector("#injiri-caption")) document.querySelector("#injiri-caption").textContent = caption;
				if(document.querySelector("#injiri-caption-mobile")) document.querySelector("#injiri-caption-mobile").textContent= caption;
			}, 0);
			}
		</script>
			<a class="collection-gallery-item <?php if($key ==0) echo 'active' ?>" onClick="changeImage('<?php echo $caption ?>','<?php echo $image_medium[0] ?>','<?php echo $image_full[0] ?>',this)" rel="lightbox">
				<img class="collection-gallery-item-image" src="<?php echo $image_thumbnail[0] ?>"/>
			</a>
		<?php } ?>
	</div>
	
		<?php } ?>
		<p class="injiri-caption visible-mobile"  id="injiri-caption-mobile"></p>

</div>
				
