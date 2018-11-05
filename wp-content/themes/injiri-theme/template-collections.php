<?php
/*Template Name: Collections*/
get_header();
// this below queries fetches all the countries
?>
<div class=" injiri-wrapper">
	<div class="row">
	<!-- <div class="col-lg-4 col-sm-4"></div> -->
	
	<?php $_terms = get_terms( array('type') );
	foreach ($_terms as $term) :
		// for all types/collection sets under collections post type
    	$term_slug = $term->slug;
    	$_posts = new WP_Query( array(
                'post_type'         => 'collections',
                'posts_per_page'    => 10, //important for a PHP memory limit warning
                'tax_query' => array(
                    array(
                        'taxonomy' => 'type',
                        'field'    => 'slug',
                        'terms'    => $term_slug,
                    ),
                ),
            ));

	    if( $_posts->have_posts() ) :
			
		// echo '<h3>'. $term->name .'</h3>';?>
		<div class="col-lg-4 col-sm-4"></div>

		<div class=" col-lg-5 col-sm-5">
			<?php while ( $_posts->have_posts() ) : $_posts->the_post();$count++	;
			?>
				
				<li class="collection-thumbnail collection-thumbnail-<?php echo  $term_slug ?> collection-thumbnail-<?php echo  $term_slug ?>-<?php echo  $count ?>" >
						<?php the_post_thumbnail();?>
				</li>
			<?php
			endwhile;?>
		</div>
		<div class=" col-lg-3 col-sm-3">

		<?php echo '<h3>'. $term->name .'</h3>';?>
		<?php
        while ( $_posts->have_posts() ) : $_posts->the_post();$count2++;
        ?>
				<li class="stockist-place" onMouseOver="changeThumbnail('<?php echo  $term_slug ?>' , '<?php echo  $count2 ?>')">
					<span class="stockist-title" ><?php the_title(); ?></span>
				</li>
			<?php
			endwhile;?></div>
        <?php
        

    endif;
    wp_reset_postdata();

endforeach;
?>
	
</div>
<script>
	function changeThumbnail(type,index){
		removeAllThumbnail(type);
		document.querySelector(`.collection-thumbnail-${type}-` + index).classList.add("active")
	}
	function removeAllThumbnail(type){
		let allImages = document.querySelectorAll(".collection-thumbnail-" + type);
		for(let i=0; i < allImages.length ; i++){
			allImages[i].classList.remove('active')
		}
		
	}
</script>
</div>
<?php ;
get_footer();
?>