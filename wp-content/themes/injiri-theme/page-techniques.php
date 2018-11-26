<?php
/*Template Name: Techniques*/
get_header(); 
query_posts(array('post_type' => 'techniques')); ?>

<div class=" injiri-wrapper">
	<div class="row">
        <div class="col-lg-7 col-sm-7 offset-4">
        <?php while (have_posts()) : the_post(); ?>
            <div class="flex techInternal row">
                <div class="tech-col techImg">
								<?php the_post_thumbnail();?>
                </div>
                <div class="techText tech-col">
                    <h2 class="title">
                        <!-- <a href="<php the_permalink() >"> -->
                            <a>
                            <?php the_title(); ?>
                            <a>
                    </h2>
                    <p class="date"><?php echo get_the_date('d.m.Y')?> </p>
                    <p class="injiri-description tech-description">
                        <?php echo get_the_excerpt(); ?>
                    </p>
                    <p style="display:flex">
                        <a class="link">
                        <!-- <a class="link" href="<php the_permalink() >"> -->
                            discover more <span>></span> 
                        </a>
                    </p>
                </div>
            </div>
        <?php endwhile;?>
    </div>
</div>
</div>

<?php get_footer(); ?>