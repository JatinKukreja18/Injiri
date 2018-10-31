<?php
/*Template Name: Reach*/
get_header();?>
<div class="row injiri-wrapper">
    <div class="col-lg-4"></div>
    <div class=" col-lg-8">
        <?php
        while (have_posts()) : the_post(); 
       ?>
       <?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'injiri-theme' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'injiri-theme' ),
			'after'  => '</div>',
		) );
		?> 
        <h2><a href="<?php the_permalink() ?>">
        <!-- <php the_title(); ></a></h2> -->
        <!-- <p><php the_excerpt(); ></p> -->
    </div>
</div>
<?php endwhile;
get_footer();
?>