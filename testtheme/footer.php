<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TestTheme_with_ajax
 */

?>
	<footer class="cst-footer">
		<div class="container">
			<div class="cst-footer__column big">
				<div class="cst-footer__logo">
					<a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_template_directory_uri();?>/dist/images/logo.png" alt="logo"></a>
				</div>
				<div class="cst-footer__desc">
					Pellentesque in ipsum id orci porta dapibus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.
				</div>
				<div class="cst-footer__copyright">
					<div class="by">Created by <a href="https://www.facebook.com/artem.benvskiy/" rel="nofollow">ArtBen</a>, grat Kiev</div>
					<div class="copyright">
						© 2017 - <?php echo date('Y'); ?> <span class="yel">ArtBen Inc.</span>
					</div>
				</div>
			</div>
			<div class="cst-footer__column mobile-hide">
				<div class="cst-footer__label">
					Links
				</div>
				<ul class="cst-footer__list">
					<li class="item"><a href="javascript:void(0);">Test link</a></li>
					<li class="item"><a href="javascript:void(0);">Test link</a></li>
					<li class="item"><a href="javascript:void(0);">Test link</a></li>
					<li class="item"><a href="javascript:void(0);">Test link</a></li>
					<li class="item"><a href="javascript:void(0);">Test link</a></li>
					<li class="item"><a href="javascript:void(0);">Test link</a></li>
				</ul>
			</div>
			<div class="cst-footer__column mobile-hide">
				<div class="cst-footer__label">
					About Us
				</div>
				<ul class="cst-footer__list">
					<li class="item"><a href="javascript:void(0);">Test link</a></li>
					<li class="item"><a href="javascript:void(0);">Test link</a></li>
					<li class="item"><a href="javascript:void(0);">Test link</a></li>
					<li class="item"><a href="javascript:void(0);">Test link</a></li>
				</ul>
			</div>
			<div class="cst-footer__column big mobile-hide">
				<div class="cst-footer__label">
					Contact Us
				</div>
				<div class="cst-footer__desc">
					Get in touch with us via mail phone.We are waiting for your call or message
				</div>

				<a href="mailto:artem.benevskiy@gmail.com" class="cst-footer__contactMail">artem.benevskiy@gmail.com</a>
			
				<div class="cst-footer__socialLinks">
					<a href="javascript:void(0);" class="link fb"></a>
					<a href="javascript:void(0);" class="link twitter"></a>
					<a href="javascript:void(0);" class="link google"></a>
				</div>
			</div>
		</div>
	</footer>

	<div class="mobileMenu">
		<button class="mobileMenu__close"></button>
		<ul class="mobileMenu__list">
			<li class="mobileMenu__list--item current"><a href="javscript:void(0);">Home</a></li>
			<li class="mobileMenu__list--item"><a href="javscript:void(0);">Services</a></li>
			<li class="mobileMenu__list--item"><a href="javscript:void(0);">Portfolio</a></li>
			<li class="mobileMenu__list--item"><a href="javscript:void(0);">About</a></li>
			<li class="mobileMenu__list--item"><a href="/contacts">Contact</a></li>
		</ul>
	</div>

	<?php wp_footer(); ?>

	</body>
</html>
