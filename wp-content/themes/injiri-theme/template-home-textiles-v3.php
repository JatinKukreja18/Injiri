<?php
/*Template Name: Full Fleed Home Textiles */
get_header();
?>
<div class="">
	<div class="">
	<!-- <div class="col-lg-4 col-sm-4"></div> -->
	
	<?php $_terms = get_terms( array('taxonomy' => 'type','slug'    => 'home-textiles') );
	foreach ($_terms as $term) :
		// for all types/collection sets under collections post type
		$term_slug = $term->slug;
    	$_posts = new WP_Query( array(
                'post_type'         => 'collections',
                'posts_per_page'    => -1, 
                'tax_query' => array(
                    array(
                        'taxonomy' => 'type',
                        'field'    => 'slug',
                        'terms'    => $term_slug,
                    ),
                ),
            ));

	    if( $_posts->have_posts() ) :
			$count = 0;
			$count2 = 0;
		// echo '<h3>'. $term->name .'</h3>';?>
		<div class="" style="width:100%">
			<div class=" collection-set">
				<div class="col-lg-12 col-sm-12 collection-set-image v3">		
					<ul>
					<?php while ( $_posts->have_posts() ) : $_posts->the_post();$count++	;
					?>
						
						<li class="collection-thumbnail collection-thumbnail-<?php echo  $term_slug ?> collection-thumbnail-<?php echo  $term_slug ?>-<?php echo  $count ?> <?php if($count ==1) echo 'active' ?>" >
								<?php the_post_thumbnail();?>
						</li>
					<?php
					endwhile;?>
					</ul>
				</div>
				<div class="" style="width:100%; padding:120px 60px 60px 60px;    position: absolute;
    top: 0px;
	left: 0px;">
				<div class="col-lg-12 row">
					<div class=" col-lg-3 col-sm-3 collection-set-list v3">
						<!-- <php echo '<h3>'. $term->name .'</h3>';> -->
						<ul class="injiri-list">
							<?php
							while ( $_posts->have_posts() ) : $_posts->the_post();$count2++;
							?>
								<li class="injiri-list-item collection-link-<?php echo  $term_slug ?> collection-link-<?php echo  $term_slug ?>-<?php echo  $count2 ?> <?php  if($count2 == 1 ) echo 'active'?>" 
									>
									<!-- if on click selected is needed -->
									<!-- onClick="changeThumbnail('<php echo  $term_slug ?>' , '<php echo  $count2 >')" -->
									<a  href="<?php the_permalink() ?>"
									onMouseOver="changeThumbnail('<?php echo  $term_slug ?>' , '<?php echo  $count2 ?>')"
									class="injiri-list-link " ><?php the_title(); ?></a>
								</li>
							<?php endwhile;?>
						</ul>
					</div>
				</div>
				</div>
			</div>
		</div>
        <?php
        

    endif;
    wp_reset_postdata();

endforeach;
?>
	
</div>
<script>
	function previewThumbnail(action,type,index){
		if(action) 	document.querySelector(`.collection-thumbnail-${type}-` + index).classList.add("preview")
		else	document.querySelector(`.collection-thumbnail-${type}-` + index).classList.remove("preview")	
	}
	function changeThumbnail(type,index){
		removeAllThumbnail(type);
		removeActiveLinks(type);
		document.querySelector(`.collection-thumbnail-${type}-` + index).classList.add("active")
		document.querySelector(`.collection-link-${type}-` + index).classList.add("active")
	}
	function removeAllThumbnail(type){
		let allImages = document.querySelectorAll(".collection-thumbnail-" + type);
		for(let i=0; i < allImages.length ; i++){
			allImages[i].classList.remove('active')
		}
	}
	function removeActiveLinks(type){
		let allLinks = document.querySelectorAll(".collection-link-" + type);
		for(let i=0; i < allLinks.length ; i++){
			allLinks[i].classList.remove('active')
		}
	}
</script>
</div>
<?php ;
get_footer();
?>