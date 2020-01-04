<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Injiri_Theme
 */

?>
<div class= "col-lg-6 col-sm-7">
<h3 class="post-links-header visible-mobile">
			<?php next_post_link('<span class="post-links-arrows left">%link</span>', '',TRUE,'','type'); ?>
			<span class="title"><?php the_title(); ?></span>
			<?php previous_post_link('<span class="post-links-arrows right">%link</span>', '',TRUE,'','type'); ?> 
</h3>		
<p class="injiri-description visible-mobile" style="margin-bottom:23px;">  <?php echo wp_strip_all_tags(strip_shortcodes(get_the_content())); ?> </p>		

<?php if ( get_post_gallery() ) {
		
		$gallery        = get_post_gallery( get_the_ID(), false );
		$galleryIDS     = $gallery['ids'];
		$pieces         = explode(",", $galleryIDS);
		$first_image_full = wp_get_attachment_image_src( $pieces[0], 'full'); 
		?>
	<div class="placeholder-image-block">
		<img class="placeholder-image" src="<?php echo(get_template_directory_uri());?>/images/placeholder.jpg" sizes="100%"/>				
		<img id="SelectedThumbnail" src="<?php echo $first_image_full[0] ?>"/>
		<a class="prev-image-arrow-link" onClick="changeMainImage(-1)">
			<span class="prev-arrow" ></span>
		</a>
		<a class="next-image-arrow-link" onClick="changeMainImage(1)">
		<span class="next-arrow" ></span>
		</a>
	</div>
	<p class="injiri-caption visible-mobile"  style="margin-top:0px;" id="injiri-caption-mobile"></p>
	<span class="collection-gallery-arrows left" onClick="scrollImages(0)"></span>
	<span class="collection-gallery-arrows right" onClick="scrollImages(1)"></span>
	<div class="collection-gallery-wrapper" >
		<?php foreach ($pieces as $key => $value ) { 

			$image_large   = wp_get_attachment_image_src( $value, 'large'); 
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
			var totalGalleryImages =  "<?php echo sizeOf($pieces)?>"
		</script>
			<a class="collection-gallery-item 
			collection-gallery-item-<?php echo $key; ?> 
			<?php if($key ==0) echo 'active' ?>" onClick="changeImage('<?php echo $caption ?>','<?php echo $image_medium[0] ?>','<?php echo $image_large[0] ?>','<?php echo $image_full[0] ?>',this,<?php echo $key ;?>)" 
			rel="lightbox"
			data-image-large="<?php echo $image_full[0] ?>"
			data-image-medium="<?php echo $image_large[0] ?>"
			data-image-small="<?php echo $image_medium[0] ?>">
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
				<div class= "col-lg-2 col-sm-4 offset-sm-1 offset-1 collection-info-container">
					 <h3 class="post-links-header hidden-mobile">
						 <?php next_post_link('<span class="post-links-arrows left">%link</span>', '',TRUE,'','type'); ?>
					 	<span class="title"><?php the_title(); ?></span>
						 <?php previous_post_link('<span class="post-links-arrows right">%link</span>', '',TRUE,'','type'); ?> 
					</h3>
					<p class="injiri-description hidden-mobile">  <?php echo wp_strip_all_tags(strip_shortcodes(get_the_content())); ?> </p>
					<p class="injiri-caption hidden-mobile" id="injiri-caption"></p>
					
</div>
				
