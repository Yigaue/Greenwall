<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package plantz_lekia_g
 */

get_header();
?>

	<main>

		<?php
		while ( have_posts() ) :
			the_post();

			// get_template_part( 'template-parts/content', get_post_type() );
		?>
		<div class="main-blog-content"> 
			<?php get_template_part( 'template-parts/content/content-single' ); ?>
			<div class="blog-article">

				<div class="dividing-line"></div>
				<div class="tags-pagination">
					<div class="tags">
						<div class="post-tags"><p>
							<?php the_tags(null, ", ") ?>
						</p></div>
					</div>
					<div class="nav-post">
						<div class="left-arrow"><img src="<?php bloginfo('template_directory')?>/assets/images/path_3015.svg" alt="left arrow">
						<p>
							<?php previous_post_link( '%link', 'Previous Post');?>
						</p></div>
						<div class="right-arrow">
							<p>
								<?php next_post_link( '%link', 'Next Post');?> 
							</p><img src="<?php bloginfo('template_directory')?>/assets/images/path_3015.svg" alt="right arrow"></div>
					</div>
				</div>
            	<div class="dividing-line"></div>
			</div>
		</div>
			<?php

		endwhile; // End of the loop.
		?>

		<div class="related-post">
		<div>
			<div class="related-post-header"><h4>Related Post</h4></div>
			<div class="blogz-container">
				<div class="blog-content-container">
				<div class="blog-content-image"><img src="<?php bloginfo('template_directory')?>/assets/images/rectangle_718.png" alt="blog image"></div>
				<div class="blog-content-info">
					<div class="blog-content-info-text"><p>Jul 2 | Read in 6 minutes</p></div>
					<div class="blog-content-info-share">
					<img src="<?php bloginfo('template_directory')?>/assets/images/group_1258.svg" alt="facebook">
					<img src="<?php bloginfo('template_directory')?>/assets/images/group_1247.svg" alt="twitter">
					<img src="<?php bloginfo('template_directory')?>/assets/images/group_1254.svg" alt="Pinterest">
					<div class="ellipse-1"><img src="<?php bloginfo('template_directory')?>/assets/images/wifi.png" alt="div Icons made by www.flaticon.com/authors/pixel-perfect"></div>
					</div>
				</div>
				<div class="blogz-content">
					<div class="blogz-text">
						<h5>
							Go Boltz - and Let Lightning Strike Twice!
						</h5>
						<p>
							The PLANTZ team is geared up to support the Tampa Bay Lightning’s repeat quest for Lord Stanley’s Cup. Nothing like some …
						</p>
					</div>
					<div class="learn-more-link">Learn More <img src="<?php bloginfo('template_directory')?>/assets/images/path_3015.svg" alt="right arrow"></div>
				</div>
				</div>
				<div class="blog-content-container">
				<div class="blog-content-image"><img src="<?php bloginfo('template_directory')?>/assets/images/rectangle_718.png" alt="blog image"></div>
				<div class="blog-content-info">
					<div class="blog-content-info-text"><p>Jul 2 | Read in 6 minutes</p></div>
					<div class="blog-content-info-share">
					<img src="<?php bloginfo('template_directory')?>/assets/images/group_1258.svg" alt="facebook">
					<img src="<?php bloginfo('template_directory')?>/assets/images/group_1247.svg" alt="twitter">
					<img src="<?php bloginfo('template_directory')?>/assets/images/group_1254.svg" alt="Pinterest">
					<div class="ellipse-1"><img src="<?php bloginfo('template_directory')?>/assets/images/wifi.png" alt="div Icons made by www.flaticon.com/authors/pixel-perfect"></div>
					</div>
				</div>
				<div class="blogz-content">
					<div class="blogz-text">
						<h5>
							Go Boltz - and Let Lightning Strike Twice!
						</h5>
						<p>
							The PLANTZ team is geared up to support the Tampa Bay Lightning’s repeat quest for Lord Stanley’s Cup. Nothing like some …
						</p>
					</div>
					<div class="learn-more-link">Learn More <img src="<?php bloginfo('template_directory')?>/assets/images/path_3015.svg" alt="right arrow"></div>
				</div>
				</div>
				<div class="blog-content-container">
				<div class="blog-content-image"><img src="<?php bloginfo('template_directory')?>/assets/images/rectangle_718.png" alt="blog image"></div>
				<div class="blog-content-info">
					<div class="blog-content-info-text"><p>Jul 2 | Read in 6 minutes</p></div>
					<div class="blog-content-info-share">
					<img src="<?php bloginfo('template_directory')?>/assets/images/group_1258.svg" alt="facebook">
					<img src="<?php bloginfo('template_directory')?>/assets/images/group_1247.svg" alt="twitter">
					<img src="<?php bloginfo('template_directory')?>/assets/images/group_1254.svg" alt="Pinterest">
					<div class="ellipse-1"><img src="<?php bloginfo('template_directory')?>/assets/images/wifi.png" alt="div Icons made by www.flaticon.com/authors/pixel-perfect"></div>
					</div>
				</div>
				<div class="blogz-content">
					<div class="blogz-text">
						<h5>
							Go Boltz - and Let Lightning Strike Twice!
						</h5>
						<p>
							The PLANTZ team is geared up to support the Tampa Bay Lightning’s repeat quest for Lord Stanley’s Cup. Nothing like some …
						</p>
					</div>
					<div class="learn-more-link">Learn More <img src="<?php bloginfo('template_directory')?>/assets/images/path_3015.svg" alt="right arrow"></div>
				</div>
				</div>
			</div>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_template_part('template-parts/content', 'footer');
