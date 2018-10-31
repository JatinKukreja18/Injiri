<?php
/*Template Name: Reach*/
get_header();?>
<div class="row injiri-wrapper">
    <div class="col-lg-4"></div>
    <div class=" col-lg-8">
        <?php
        while (have_posts()) : the_post(); ?>
        <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
        <p><?php the_excerpt(); ?></p>
    </div>
</div>
<?php endwhile;
get_footer();
?>