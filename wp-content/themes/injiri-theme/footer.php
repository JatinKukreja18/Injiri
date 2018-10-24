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
		<div class="site-info">
			
				<!-- <php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( 'Designed by Shambhavi Ojha | Developed by Jatin Kukreja ');
				> -->
		</div><!-- .site-info -->
		<div class="footerContent">
            <div class="emailInputContainer">
                <span>
                    <input name="email" class="inputEmail" type="text" placeholder="Enter Email">
                </span>
            </div>
            <div>
                <ul class="footerMenus blackHover">
                    <li class="footerItem"><a class="menusLink" href="">Subscribe</a></li>
                    <li class="footerItem"><a class="menusLink" href="">Facebook</a></li>
                    <li class="footerItem"><a class="menusLink" href="">Instagram</a></li>
                    <li class="footerItem"><a class="menusLink" href="">Privacy Policy</a></li>
                    <li class="footerItem"> &copy; 2018 INJIRI </li>
                </ul>
            </div>
        </div>
	</footer><!-- #colophon -->
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
