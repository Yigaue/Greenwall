<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package plantz_lekia_g
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="blog-content-header-image">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

		<div class="blog-content-info">
            <div class="blog-content-info-text"><p> <?php echo get_the_date('M j') ?> | <?php echo do_shortcode('[read_meter] MINUTES READ [/read_meter]'); ?> </p></div>
            <div class="blog-content-info-share">
                <img src="<?php bloginfo('template_directory')?>/assets/images/group_1258.svg" alt="facebook">
                <img src="<?php bloginfo('template_directory')?>/assets/images/group_1247.svg" alt="twitter">
                <img src="<?php bloginfo('template_directory')?>/assets/images/group_1254.svg" alt="Pinterest">
                <div class="ellipse-1"><img src="<?php bloginfo('template_directory')?>/assets/images/wifi.png" alt="div Icons made by www.flaticon.com/authors/pixel-perfect"></div>
            </div>
        </div>
		<div class="blog-article">
			<p><?php
				$content = get_the_content();
				$content = preg_replace("/<img[^>]+\>/i", " ", $content);      
				$content = apply_filters('the_content', $content);
				$content = str_replace(']]>', ']]>', $content);
				echo $content;
				$images =& get_children( array (
					'post_parent' => $post->ID,
					'post_type' => 'attachment',
					'post_mime_type' => 'image'
				)); 
			?>
			<div class="blog-article-image-gallery" style="width:100%; height: 550px;">
				<?php
				if ( empty($images) ) :
					// no attachments here
				else :
					foreach ( $images as $attachment_id => $attachment ) :
						echo wp_get_attachment_image( $attachment_id, 'full', "", array( "class" => "mySlides" ));
					endforeach;
				endif;
				?>
			</div>

			<div class="w3-center">
				<?php
					if ( empty($images) ) :
						// no attachments here
					else :
						for ( $i; $i < count($images); $i ++) : 
							$n = $i + 1;
						?>
							<span class ="w3-badge demo" onclick="currentDiv(<?php echo $n; ?>)"></span>
					<?php endfor;
					endif;
				?>
            </div>
		</p>
		</div>

</article><!-- #post-<?php the_ID(); ?> -->


<script>
	var slideIndex = 1;
	showDivs(slideIndex);
	function plusDivs(n) {
		showDivs(slideIndex += n);
	}
	function currentDiv(n) {
		showDivs(slideIndex = n);
	}
	function showDivs(n) {
		var i;
		var x = document.getElementsByClassName("mySlides");
		var dots = document.getElementsByClassName("demo");
		if (n > x.length) {slideIndex = 1}
		if (n < 1) {slideIndex = x.length}
		for (i = 0; i < x.length; i++) {
		x[i].style.display = "none";  
		}
		for (i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.replace(" w3-white", "");
		}
		x[slideIndex-1].style.display = "block";  
		dots[slideIndex-1].className += " w3-white";
	}
     
                // Add active class to the current button (highlight it)
	var header = document.getElementsByClassName("w3-center");
	var btns = document.getElementsByClassName("w3-badge");
	for (var i = 0; i < btns.length; i++) {
		btns[i].addEventListener("click", function() {
		var current = document.getElementsByClassName("active");
		if (current.length > 0) {
		current[0].className = current[0].className.replace(" active", "");
		}
		this.className += " active";
		});
	}
</script>
