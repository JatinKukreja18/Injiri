<?php
/*Template Name: Reach*/
get_header();
// this below queries fetches all the countries
?>
<div class=" injiri-wrapper">
	<div class="row">
	<div class="col-lg-4 col-sm-4"></div>
	
    <div class=" col-lg-4 col-sm-4">
	<h6 class="injiri-section-heading">Stockists</h6>
		<ul class="stockist-container">

<?php
query_posts(array('post_type' => 'stockists','posts_per_page' => -1 ,'post_parent' => 0,'orderby' => 'title','order' => 'ASC')); 
while (have_posts()) : the_post(); ?>
	<li class="stockist-place" >
		<!-- country title -->
		<span class="stockist-title" onClick="toggleCity(this.parentNode);"><?php the_title(); ?></span>
		
		<!-- this below queries fetches all the sub countires/cities -->
		<?php 
		$args=array(
                'orderby' => 'title',
                'order' => 'ASC',
                'posts_per_page' => 3,
                'post_type' => get_post_type( $post->ID ),
                'post_parent' => $post->ID
        );

        $childpages = new WP_Query($args);

        if($childpages->post_count > 0) { /* display the children content  */
            echo "<ul class='stockist-subplace'>";
            while ($childpages->have_posts()) {
                 $childpages->the_post();
				 echo "<li>
				 			<span class='stockist-title'>"
				 			.get_the_title().
							 "</span>
							 <div class='addresses'>"
							 .get_the_content().
							 "
							 </div>
						</li>";
            }
            echo "</ul>";
        }
		?>
	</li>
	
		<?php endwhile?>
	</div>
</div>
<div class="row">
	<div class="col-lg-4 col-sm-4"></div>
	
    <div class=" col-lg-4 col-sm-4">
		<?php
				wp_reset_query();

				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'nohead' );


				endwhile; // End of the loop.
				?>
	</div>
</div>
<script>
	function toggleCity(value){
		if(value.lastElementChild.classList.contains('stockist-subplace')){
			value.lastElementChild.classList.toggle("open");
			value.classList.toggle("open");
		}
	}
</script>
</div>
<?php ;
get_footer();
?>