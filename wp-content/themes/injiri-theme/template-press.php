<?php
/*Template Name: Press*/
get_header(); 
query_posts(array('post_type' => 'press')); ?>

<div class=" injiri-wrapper">
	<div class="row">
        <div class="col-lg-6 col-sm-6 offset-4">
        <?php while (have_posts()) : the_post(); ?>
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
                    $first_image_full = wp_get_attachment_image_src( $pieces[0], 'full');

                ?>
	            <div class="press-gallery-wrapper row" >
                    <?php foreach ($pieces as $key => $value ) { 

                        $image_medium   = wp_get_attachment_image_src( $value, 'medium'); 
                        $image_thumbnail   = wp_get_attachment_image_src( $value, 'thumbnail'); 
                        $image_full     = wp_get_attachment_image_src( $value, 'full'); 
                        $caption = wp_get_attachment_caption($value)
                        
                    ?>
                    <img class="press-image col-sm-6 col-lg-6" src="<?php echo $image_full[0] ?>"/>
                    <?php } ?>

	            </div>
	        	<?php }?>
            </div>
        <?php endwhile;?>
    </div>
</div>
</div>

<?php get_footer(); ?>