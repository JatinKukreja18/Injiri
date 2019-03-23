<?php
/*Template Name: Story*/
get_header(); ?>

<div class=" injiri-wrapper">
	<div class="row">
        <div class="col-lg-5 col-sm-12 offset-4 story-page-wrapper">
        <?php while (have_posts()) : the_post(); ?>
            
                <!-- <p class="date"><php echo get_the_date('d.m.Y')> </p> -->
                
                    <?php  the_content(); ?>
                
            </div>
        <?php endwhile;?>
    </div>
</div>
</div>

<?php get_footer(); ?>