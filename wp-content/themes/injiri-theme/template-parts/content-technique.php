<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Injiri_Theme
 */

?>
<div class= "col-lg-7 col-sm-12 offset-3 technique-item">	
	<p class="date"><?php echo get_the_date('d.m.Y')?> </p>

	<h3 class="heading"><?php the_title(); ?></h3>
	<div class="divider"></div>
	<p class="injiri-description">  
		<?php  the_content(); ?> 
	</p>
	<p class="injiri-caption hidden-mobile" id="injiri-caption"></p>
					
</div>
				
