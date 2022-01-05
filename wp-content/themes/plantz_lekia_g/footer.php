<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package plantz_lekia_g
 */

?>

	<footer id="colophon">
		<?php  if ( ! is_front_page() ) : ?>
			<section class="subscription-area">
				<?php get_template_part('template-parts/footer/subscription'); ?>
			</section>
		<?php endif; ?>

		<?php  if ( ! is_page('basic') ) : ?>
		<section class="site-footer">
			<?php get_template_part('template-parts/content', 'footer'); ?>
		</section>
		<?php endif; ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
