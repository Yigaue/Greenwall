<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package plantz_lekia_g
 */

get_header();
?>

<main>
<div class="blog-heading"><h1>blogz</h1></div>
    <div class="blog-info"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In mollis est nec nunc varius venenatis. Curabitur bibendum sem vel nunc blandit, a porttitor felis lacinia. Curabitur vitae congue massa, at sodales nunc.</p></div>
      <div class="page-search-head">
          <div class="search-category-container">
              <div class="dropdown">
                <button class="dropbtn"><p>YEAR <i class="fas fa-angle-down"></i></p></button>
                <div class="dropdown-content">
                    <li><a class="dropdown-item" href="#">2020</a></li>
                    <li><a class="dropdown-item" href="#">2021</a></li>
                    <li><a class="dropdown-item" href="#">2022</a></li>
                </div>
              </div>
              <div class="dropdown">
                <button class="dropbtn"><p>MONTH <i class="fas fa-angle-down"></i></p></button>
                <div class="dropdown-content">
                    <li><a class="dropdown-item" href="#">January</a></li>
                    <li><a class="dropdown-item" href="#">February</a></li>
                    <li><a class="dropdown-item" href="#">March</a></li>
                    <li><a class="dropdown-item" href="#">April</a></li>
                    <li><a class="dropdown-item" href="#">May</a></li>
                    <li><a class="dropdown-item" href="#">June</a></li>
                    <li><a class="dropdown-item" href="#">July</a></li>
                    <li><a class="dropdown-item" href="#">August</a></li>
                    <li><a class="dropdown-item" href="#">September</a></li>
                    <li><a class="dropdown-item" href="#">October</a></li>
                    <li><a class="dropdown-item" href="#">November</a></li>
                    <li><a class="dropdown-item" href="#">December</a></li>
                </div>
              </div>
              <div class="dropdown">
                <button class="dropbtn"><p>TYPE <i class="fas fa-angle-down"></i></p></button>
                <div class="dropdown-content">
                    <li><a class="dropdown-item" href="#">Type A</a></li>
                    <li><a class="dropdown-item" href="#">Type B</a></li>
                    <li><a class="dropdown-item" href="#">Type C</a></li>
                </div>
              </div>
        </div>
        <div class="page-search">
          <i class="fas fa-search"></i>
          <input type="text" name="search">
        </div>
      </div>
    </section>
    <section>
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
      <div class="view-more-container">
        <div class="contact-us-button">VIEW MORE</div>
      </div>
    </section>
</main>

<?php
get_footer();
?>