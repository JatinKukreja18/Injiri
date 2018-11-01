<?php
/*Template Name: Reach*/
get_header();
query_posts(array('post_type' => 'stockists','post_parent' => 0,'orderby' => 'title','order' => 'ASC')); ?>
<div class=" injiri-wrapper">
	<div class="row">
    <div class="col-lg-4 col-sm-4"></div>
    <div class=" col-lg-4 col-sm-4">
		<ul>

<?php
while (have_posts()) : the_post(); ?>
	<li class="stockist-place" >
		<span class="stockist-title" onClick="toggleCity(this.parentNode);"><?php the_title(); ?></span>
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