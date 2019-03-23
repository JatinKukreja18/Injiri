<?php
/*Template Name: Clothing Portrait*/
get_header();
?>
<div class=" injiri-wrapper">
	<div class="row">
	<!-- <div class="col-lg-4 col-sm-4"></div> -->
	
	<?php $_terms = get_terms( array('taxonomy' => 'type','slug'    => 'clothing') );
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
		// echo '<h3>'. Collections .'</h3>';?>
		<div class="col-lg-8 col-sm-12 offset-3 collection-spacer">
			<div class="row collection-set">
				<div class="col-lg-6 col-sm-6 collection-set-image v2">		
					<ul>
					<?php while ( $_posts->have_posts() ) : $_posts->the_post();$count++	;
					?>
						
						<li class="collection-thumbnail collection-thumbnail-<?php echo  $term_slug ?> collection-thumbnail-<?php echo  $term_slug ?>-<?php echo  $count ?> 
						<?php if($count ==1) echo 'active' ?>"  onMouseLeave="autoPlay()"
							onMouseEnter="autoPlay()"
							onClick="redirect('<?php the_permalink()?>')">
								<?php the_post_thumbnail();?>
						</li>
					<?php
					endwhile;?>
					</ul>
				</div>
				<div class=" col-lg-3 col-sm-3 collection-set-list v3 v2" style="margin-top: 0px;">
					<h3 class="hidden-mobile">Collections</h3>
					<ul class="injiri-list">
					<a  class="mobile-collection-arrows visible-mobile left" onClick="mobileChangeThumbnail(false)">
								<i class="post-links-arrows left"></i>
							</a>
						<?php
						while ( $_posts->have_posts() ) : $_posts->the_post();$count2++;
						?>
							<li class="injiri-list-item collection-link-<?php echo  $term_slug ?> collection-link-<?php echo  $term_slug ?>-<?php echo  $count2 ?> <?php if($count2 ==1) echo 'active' ?>"" 
								>
								<!-- if on click selected is needed -->
								<!-- onClick="changeThumbnail('<php echo  $term_slug ?>' , '<php echo  $count2 >')" -->
								<a   onMouseLeave="autoPlay()"
							onMouseEnter="autoPlay()" href="<?php the_permalink() ?>"
								onMouseOver="changeThumbnail('<?php echo  $term_slug ?>' , '<?php echo  $count2 ?>')"
								class="injiri-list-link" ><?php the_title(); ?></a>
							</li>
						<?php endwhile;?>
						<a  class="mobile-collection-arrows visible-mobile right" onClick="mobileChangeThumbnail(true)">
								<i class="post-links-arrows right"></i>
							</a>
					</ul>
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
	function redirect(link){
		console.log(link);	
		window.location.href = link;
	}
	function previewThumbnail(action,type,index){
		if(action) 	document.querySelector(`.collection-thumbnail-${type}-` + index).classList.add("preview")
		else	document.querySelector(`.collection-thumbnail-${type}-` + index).classList.remove("preview")	
	}
	function changeThumbnail(type,index){
		removeAllThumbnail(type);
		removeActiveLinks(type);
		document.querySelector(`.collection-thumbnail-${type}-` + index).classList.add("active")
		document.querySelector(`.collection-link-${type}-` + index).classList.add("active")
		currentSlide = parseInt(index) -1;

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
	// function autoPlay(){
	// 	let allImages = document.querySelectorAll(".collection-thumbnail-clothing");
	// 	console.log(allImages.length )
	// 	nextIndex = 1;
	// 	setInterval(() => {
	// 				changeThumbnail('clothing', nextIndex);
	// 				if (nextIndex < allImages.length) {
	// 					nextIndex += 1;
	// 				}
	// 				else{
	// 					nextIndex = 1;
	// 				}
					
	// 	}, 3000);
	// }
	// autoPlay();
	var slides = document.querySelectorAll('.collection-thumbnail-clothing');
	var links = document.querySelectorAll('.collection-link-clothing');
	var currentSlide = 0;
	var slideInterval = setInterval(nextSlide,4000);
	function mobileChangeThumbnail(value){
		removeAllThumbnail('home-textiles');
		removeActiveLinks('home-textiles');
		if(value){
			nextSlide();
			pauseSlideshow();
			playSlideshow();

		}
		else{
			previousSlide();
			pauseSlideshow();
			playSlideshow();
		}
	}
	function previousSlide(){
		slides[currentSlide].classList.remove('active');
		links[currentSlide].classList.remove('active');
		if(currentSlide != 0){
			currentSlide = (currentSlide-1)%slides.length;
		}
		else{
			currentSlide = slides.length - 1;
		}
		slides[currentSlide].classList.add('active');
		links[currentSlide].classList.add('active');
	}
	function nextSlide(){
		slides[currentSlide].classList.toggle('active');
		links[currentSlide].classList.toggle('active');
		currentSlide = (currentSlide+1)%slides.length;
		slides[currentSlide].classList.toggle('active');
		links[currentSlide].classList.toggle('active');

	}

	var playing = true;
	// var pauseButton = document.getElementById('pause');

	function pauseSlideshow(){
		// pauseButton.innerHTML = 'Play';
		playing = false;
		clearInterval(slideInterval);
	}

	function playSlideshow(){
		// pauseButton.innerHTML = 'Pause';
		playing = true;
		slideInterval = setInterval(nextSlide,4000);
	}

	// pauseButton.onclick = function(){
	// 	if(playing){ pauseSlideshow(); }
	// 	else{ playSlideshow(); }
	// };
	function autoPlay(){
		if(playing){ pauseSlideshow(); }
		else{ playSlideshow(); }
	}
</script>
</div>
<?php ;
get_footer();
?>