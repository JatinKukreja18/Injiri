<?php
/*Template Name: CollectionsV2*/
get_header();
?>
<div class=" injiri-wrapper">
	<div class="row">
	<!-- <div class="col-lg-4 col-sm-4"></div> -->
	<div class="col-lg-8 col-sm-8 offset-3 collection-spacer">
	<div class="row">
	<?php $_terms = get_terms( array('type') );
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
			<div class=" collection-set col-sm-6 col-md-6">
				<?php echo '<h3>'. $term->name .'</h3>';?>
				<div class="collection-set-image">		
					<ul>
					<?php while ( $_posts->have_posts() ) : $_posts->the_post();$count++	;
					?>
						
						<li class="collection-thumbnail v2 collection-thumbnail-<?php echo  $term_slug ?> collection-thumbnail-<?php echo  $term_slug ?>-<?php echo  $count ?> <?php if($count ==1) echo 'active' ?>" >
							<a href="<?php the_permalink() ?>">
								<?php the_post_thumbnail();?>
							</a>
						</li>
					<?php
					endwhile;?>
					</ul>
				</div>

				<div class="collection-set-list v2">
						<ul class="injiri-list">
							<?php
							while ( $_posts->have_posts() ) : $_posts->the_post();$count2++;
							?>
								<span class="injiri-list-item collection-link-<?php echo  $term_slug ?> collection-link-<?php echo  $term_slug ?>-<?php echo  $count2 ?> " 
									>
									<!-- if on click selected is needed -->
									<!-- onClick="changeThumbnail('<php echo  $term_slug ?>' , '<php echo  $count2 >')" -->
									<a  href="<?php the_permalink() ?>"
									onMouseOver="changeThumbnail('<?php echo  $term_slug ?>' , '<?php echo  $count2 ?>')"
									class="injiri-list-link" ><?php the_title(); ?></a>
							</span>
							<span style="font-family:'Gentium Basic';font-size: 12px;margin: 5px;"><?php echo the_post()?> /</span>
							<?php endwhile;?>
						</ul>
				</div>
			</div>
			<?php
        
		
    endif;
    wp_reset_postdata();
	
endforeach;
?>
</div>
</div>
	
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