<?php
/*Template Name: Press*/
get_header(); 
query_posts(array('post_type' => 'press')); ?>

<div class=" injiri-wrapper">
	<div class="row">
        <div class="col-lg-6 col-sm-12 offset-4">
        <?php $count = 0;?>
        <?php while (have_posts()) : the_post(); $count++?>
            <div class=" row">
                <h2 class="title">
                    <a> <?php the_title(); ?>  </a>
                </h2>
                <!-- <p class="date"><php echo get_the_date('d.m.Y')> </p> -->
                <p  style="
    width: 100%;
    margin-bottom: 28px;">
                    <?php echo get_the_excerpt(); ?>
                </p>
                <?php if ( get_post_gallery() ) {		
                    $gallery        = get_post_gallery( get_the_ID(), false );
                    $galleryIDS     = $gallery['ids'];
                    $pieces         = explode(",", $galleryIDS);

                ?>
	            <div class="press-gallery-wrapper row" >
                    <?php foreach ($pieces as $key => $value ) { 

                        $image_medium   = wp_get_attachment_image_src( $value, 'medium'); 
                        $image_thumbnail   = wp_get_attachment_image_src( $value, 'thumbnail'); 
                        $image_full     = wp_get_attachment_image_src( $value, 'full'); 
                        $caption = wp_get_attachment_caption($value)
                        
                    ?>
                    <!-- galleryIDS -->
                    <img onClick="openPreview('<?php echo $key ?>','<?php echo $count ?>')" class="press-image col-sm-6 col-lg-6" src="<?php echo $image_full[0] ?>"/>
                    <?php } ?>

	            </div>
	        	<?php }?>
            </div>
            <div class="image-preview-overlay preview-<?php echo $count?>" onClick="closePreview('<?php echo $count?>')">
                        <div class="preview-container"> 
                            <!-- <span class="preview-arrows left" onClick="prevImage()"></span>
                            <span class="preview-arrows right" onClick="nextImage()"></span> -->
                            <div class="preview-images">
                            <?php foreach ($pieces as $key => $value ) { 

                            $image_medium   = wp_get_attachment_image_src( $value, 'medium'); 
                            $image_thumbnail   = wp_get_attachment_image_src( $value, 'thumbnail'); 
                            $image_full     = wp_get_attachment_image_src( $value, 'full'); 
                            $caption = wp_get_attachment_caption($value)

                            ?>
                            <!-- galleryIDS -->
                            <img  class="preview-image-<?php echo $key?>" src="<?php echo $image_full[0] ?>"/>
                            <?php } ?>
                            </div>
                        </div>
            </div>
        <?php endwhile;?>
    </div>
</div>
</div>

<script>
    function closePreview(val){
        if(event.target.classList.contains('preview-images')){
            document.querySelector('.image-preview-overlay.preview-' + val).classList.remove('show');
        }
    }
    function openPreview(imageIndex,releaseIndex){
        console.log(imageIndex)
        if(!document.querySelector('.image-preview-overlay.preview-' + releaseIndex).classList.contains('show')){
            document.querySelector('.image-preview-overlay.preview-' + releaseIndex).classList.add('show');
        }
        setTimeout(() => {
            const pos = document.querySelector('.preview-' + releaseIndex +  ' .preview-image-' + imageIndex).offsetTop
            document.querySelector('.image-preview-overlay.preview-' + releaseIndex  + ' .preview-images').scrollTop = pos - 40

        }, 0);
    }
    function nextImage(){

    }
    function prevImage(){

}
</script>
<?php get_footer(); ?>