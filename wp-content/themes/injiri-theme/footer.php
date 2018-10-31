<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Injiri_Theme
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer footerContainer">
    <div id="footer-sidebar" class="footer-sections">
        <div id="footer-sidebar1">
            <?php
            if(is_active_sidebar('footer-sidebar-1')){
            dynamic_sidebar('footer-sidebar-1');
            }
            ?>
        </div>
        <div id="footer-sidebar2">
            <?php
            if(is_active_sidebar('footer-sidebar-2')){
            dynamic_sidebar('footer-sidebar-2');
            }
            ?>
        </div>
        <div id="footer-sidebar3">
            <?php
            if(is_active_sidebar('footer-sidebar-3')){
            dynamic_sidebar('footer-sidebar-3');
            }
            ?>
            <!-- <div class="footerContent">
            <div class="emailInputContainer">
                <span>
                    <input name="email" class="inputEmail" type="text" placeholder="Enter Email">
                </span>
            </div> -->
        </div>
        </div>
    </div>
		<div class="site-info">
			
				<!-- <php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( 'Designed by Shambhavi Ojha | Developed by Jatin Kukreja ');
				> -->
		</div><!-- .site-info -->
		
	</footer><!-- #colophon -->
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
