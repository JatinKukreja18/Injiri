<?php
/*Template Name: Reach*/
get_header();
// this below queries fetches all the countries
?>
<div class=" injiri-wrapper">
<div class="row">
	
    <div class=" col-lg-4 col-sm-6 offset-4">
		<?php
				wp_reset_query();

				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'nohead' );


				endwhile; // End of the loop.
				?>
	</div>
</div>
	<div class="row">
	
    <div class=" col-lg-4 col-sm-6 offset-4">
	<h6 class="injiri-section-heading" style="margin-top:75px;">Stockists</h6>
		<ul class="stockist-container">

<?php
query_posts(array('post_type' => 'stockists','posts_per_page' => -1 ,'post_parent' => 0,'orderby' => 'title','order' => 'ASC')); 
while (have_posts()) : the_post(); ?>
	<li class="stockist-place" >
		<!-- country title -->
		<span class="stockist-title" onClick="toggleCity(this.parentNode);"><?php the_title(); ?></span>
		<span class='stockist-close' onClick='closeStockist(this.parentNode)'></span>
		<!-- this below queries fetches all the sub countires/cities -->
		<?php 
		$args=array(
                'orderby' => 'title',
                'order' => 'ASC',
                'posts_per_page' => -1,
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
							 .wpautop( get_the_content(), false ).
							 "
							 </div>
							
						</li>";
            }
            echo " </ul>";
        }
		?>
	</li>
	
		<?php endwhile?>
		
		</ul>
	</div>
</div>

<script>
	function toggleCity(value){
		closeAllStockists();
		if(value.lastElementChild.classList.contains('stockist-subplace')){
			value.lastElementChild.classList.toggle("open");
			value.classList.toggle("open");
			value.children[1].classList.toggle('show')
			console.log(this)
		}
	}
	function  closeStockist(value){
		console.log(value)
		document.querySelector("body").scrollTop = value.offsetTop;
		document.querySelector("html").scrollTop = value.offsetTop;

		if(value.lastElementChild.classList.contains('stockist-subplace')){
			value.lastElementChild.classList.toggle("open");
			value.classList.toggle("open");
			value.children[1].classList.toggle('show')
			console.log(this)
		}
	}
	function closeAllStockists(){
		
		let allStockist = document.querySelectorAll(".stockist-place")
		for(let i=0; i < allStockist.length ; i++){
			allStockist[i].classList.remove('open')
			allStockist[i].children[1].classList.remove('show')
		}
		let allSubStockist = document.querySelectorAll(".stockist-subplace")
		for(let i=0; i < allSubStockist.length ; i++){
			allSubStockist[i].classList.remove('open')
		}
	}
	window.addEventListener("scroll", function(){ 
		setTimeout(() => {
		const elem = document.querySelector(".stockist-place.open");
		if(document && elem){
			const YFromTop = elem.offsetTop + 188;
			const scrollableY = elem.scrollHeight;

			console.log('window --> ' + window.scrollY );
			console.log('toppos --> ' + YFromTop);
			console.log('scrlheight --> ' + scrollableY);
			// if(window.innerHeight < elem.scrollHeight)
			// {
				// elem.children[1].classList.add('fixed');
				// if(window.scrollY > (YFromTop + scrollableY - window.innerHeight) ){
				if(window.scrollY > YFromTop - 54  ){
					if(window.scrollY > (YFromTop + scrollableY - 54 ) ){
						elem.children[1].classList.remove('fixed');
						elem.children[1].classList.add('bottom');
					}
					else{
						elem.children[1].classList.remove('bottom');
						elem.children[1].classList.add('fixed');

					}
				}
				
				else{
					elem.children[1].classList.remove('fixed');
				}
			// }
			// else{
			// 	elem.children[1].classList.remove('fixed');
			// }
		}
		}, 0);
	}, false);
</script>
</div>
<?php ;
get_footer();
?>