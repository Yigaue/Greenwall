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
    <section class="catalog-head">
        <div id="header"></div>
        <div class="blog-heading"><h1>catalog</h1></div>
        <div class="blog-info"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In mollis est nec nunc varius venenatis. Curabitur bibendum sem vel nunc blandit, a porttitor felis lacinia. Curabitur vitae congue massa, at sodales nunc.</p></div>
    </section>
    <section class="catalog-category">
      <div class="page-search-head">
          <div class="search-category-container">
              <div class="dropdown">
                <button class="dropbtn"><p>SORT <i class="fas fa-angle-down"></i></p></button>
                <div class="dropdown-content">
                    <li><a class="dropdown-item" href="#">1</a></li>
                    <li><a class="dropdown-item" href="#">2</a></li>
                    <li><a class="dropdown-item" href="#">3</a></li>
                </div>
              </div>
              <div class="dropdown">
                <button class="dropbtn"><p>CARE LEVEL<i class="fas fa-angle-down"></i></p></button>
                <div class="dropdown-content">
                    <li><a class="dropdown-item" href="#">1</a></li>
                    <li><a class="dropdown-item" href="#">2</a></li>
                    <li><a class="dropdown-item" href="#">3</a></li>
                </div>
              </div>
              <div class="dropdown">
                <button class="dropbtn"><p>LIGHT<i class="fas fa-angle-down"></i></p></button>
                <div class="dropdown-content">
                    <li><a class="dropdown-item" href="#">1</a></li>
                    <li><a class="dropdown-item" href="#">2</a></li>
                    <li><a class="dropdown-item" href="#">3</a></li>
                </div>
              </div>
              <div class="dropdown">
                <button class="dropbtn"><p>SIZE<i class="fas fa-angle-down"></i></p></button>
                <div class="dropdown-content">
                    <li><a class="dropdown-item" href="#">1</a></li>
                    <li><a class="dropdown-item" href="#">2</a></li>
                    <li><a class="dropdown-item" href="#">3</a></li>
                </div>
              </div>
        </div>
        <div class="page-search">
          <i class="fas fa-search"></i>
          <input type="text" name="search">
        </div>
      </div>
    </section>
    <div class="page-number"><P>Page 1 of 3</P></div>
    <section class="catalog">
        <div class="section-5-container">
            <div class="catalog-image-container">
                <div class="catalog-image">
                    <img src="<?php bloginfo('template_directory')?>/assets/images/rectangle_768.png" alt="plant1">
                </div>
                <div class="plant-name-share">
                    <div><p>Aspidistra</p></div>
                    <div class="social-share">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1249.svg" alt="Twitter">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1247.svg" alt="Pinterest">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1248.svg" alt="LinkedIn">
                    </div>
                </div>
            </div>
            <div class="catalog-image-container">
                <div class="catalog-image">
                    <img src="<?php bloginfo('template_directory')?>/assets/images/rectangle_769.png" alt="plant2">
                </div>
                <div class="plant-name-share">
                    <div><p>Boston Fern</p></div>
                    <div class="social-share">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1249.svg" alt="Twitter">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1247.svg" alt="Pinterest">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1248.svg" alt="LinkedIn">
                    </div>
                </div>
            </div>
            <div class="catalog-image-container">
                <div class="catalog-image">
                    <img src="<?php bloginfo('template_directory')?>/assets/images/rectangle_770.png" alt="plant3">
                </div>
                <div class="plant-name-share">
                    <div><p>Croton</p></div>
                    <div class="social-share">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1249.svg" alt="Twitter">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1247.svg" alt="Pinterest">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1248.svg" alt="LinkedIn">
                    </div>
                </div>
            </div>
            <div class="catalog-image-container">
                <div class="catalog-image">
                    <img src="<?php bloginfo('template_directory')?>/assets/images/rectangle_771.png" alt="plant4">
                </div>
                <div class="plant-name-share">
                    <div><p>Imperial Red</p></div>
                    <div class="social-share">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1249.svg" alt="Twitter">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1247.svg" alt="Pinterest">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1248.svg" alt="LinkedIn">
                    </div>
                </div>
            </div>
            <div class="catalog-image-container">
                <div class="catalog-image">
                    <img src="<?php bloginfo('template_directory')?>/assets/images/rectangle_768.png" alt="plant1">
                </div>
                <div class="plant-name-share">
                    <div><p>Aspidistra</p></div>
                    <div class="social-share">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1249.svg" alt="Twitter">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1247.svg" alt="Pinterest">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1248.svg" alt="LinkedIn">
                    </div>
                </div>
            </div>
            <div class="catalog-image-container">
                <div class="catalog-image">
                    <img src="<?php bloginfo('template_directory')?>/assets/images/rectangle_769.png" alt="plant2">
                </div>
                <div class="plant-name-share">
                    <div><p>Boston Fern</p></div>
                    <div class="social-share">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1249.svg" alt="Twitter">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1247.svg" alt="Pinterest">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1248.svg" alt="LinkedIn">
                    </div>
                </div>
            </div>
            <div class="catalog-image-container">
                <div class="catalog-image">
                    <img src="<?php bloginfo('template_directory')?>/assets/images/rectangle_770.png" alt="plant3">
                </div>
                <div class="plant-name-share">
                    <div><p>Croton</p></div>
                    <div class="social-share">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1249.svg" alt="Twitter">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1247.svg" alt="Pinterest">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1248.svg" alt="LinkedIn">
                    </div>
                </div>
            </div>
            <div class="catalog-image-container">
                <div class="catalog-image">
                    <img src="<?php bloginfo('template_directory')?>/assets/images/rectangle_771.png" alt="plant4">
                </div>
                <div class="plant-name-share">
                    <div><p>Imperial Red</p></div>
                    <div class="social-share">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1249.svg" alt="Twitter">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1247.svg" alt="Pinterest">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1248.svg" alt="LinkedIn">
                    </div>
                </div>
            </div>
            <div class="catalog-image-container">
                <div class="catalog-image">
                    <img src="<?php bloginfo('template_directory')?>/assets/images/rectangle_768.png" alt="plant1">
                </div>
                <div class="plant-name-share">
                    <div><p>Aspidistra</p></div>
                    <div class="social-share">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1249.svg" alt="Twitter">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1247.svg" alt="Pinterest">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1248.svg" alt="LinkedIn">
                    </div>
                </div>
            </div>
            <div class="catalog-image-container">
                <div class="catalog-image">
                    <img src="<?php bloginfo('template_directory')?>/assets/images/rectangle_769.png" alt="plant2">
                </div>
                <div class="plant-name-share">
                    <div><p>Boston Fern</p></div>
                    <div class="social-share">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1249.svg" alt="Twitter">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1247.svg" alt="Pinterest">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1248.svg" alt="LinkedIn">
                    </div>
                </div>
            </div>
            <div class="catalog-image-container">
                <div class="catalog-image">
                    <img src="<?php bloginfo('template_directory')?>/assets/images/rectangle_770.png" alt="plant3">
                </div>
                <div class="plant-name-share">
                    <div><p> Croton</p></div>
                    <div class="social-share">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1249.svg" alt="Twitter">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1247.svg" alt="Pinterest">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1248.svg" alt="LinkedIn">
                    </div>
                </div>
            </div>
            <div class="catalog-image-container">
                <div class="catalog-image">
                    <img src="<?php bloginfo('template_directory')?>/assets/images/rectangle_771.png" alt="plant4">
                </div>
                <div class="plant-name-share">
                    <div><p>Imperial Red</p></div>
                    <div class="social-share">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1249.svg" alt="Twitter">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1247.svg" alt="Pinterest">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1248.svg" alt="LinkedIn">
                    </div>
                </div>
            </div>
            <div class="catalog-image-container">
                <div class="catalog-image">
                    <img src="<?php bloginfo('template_directory')?>/assets/images/rectangle_768.png" alt="plant1">
                </div>
                <div class="plant-name-share">
                    <div><p>Aspidistra</p></div>
                    <div class="social-share">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1249.svg" alt="Twitter">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1247.svg" alt="Pinterest">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1248.svg" alt="LinkedIn">
                    </div>
                </div>
            </div>
            <div class="catalog-image-container">
                <div class="catalog-image">
                    <img src="<?php bloginfo('template_directory')?>/assets/images/rectangle_769.png" alt="plant2">
                </div>
                <div class="plant-name-share">
                    <div><p>Boston Fern</p></div>
                    <div class="social-share">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1249.svg" alt="Twitter">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1247.svg" alt="Pinterest">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1248.svg" alt="LinkedIn">
                    </div>
                </div>
            </div>
            <div class="catalog-image-container">
                <div class="catalog-image">
                    <img src="<?php bloginfo('template_directory')?>/assets/images/rectangle_770.png" alt="plant3">
                </div>
                <div class="plant-name-share">
                    <div><p>Croton</p></div>
                    <div class="social-share">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1249.svg" alt="Twitter">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1247.svg" alt="Pinterest">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1248.svg" alt="LinkedIn">
                    </div>
                </div>
            </div>
            <div class="catalog-image-container">
                <div class="catalog-image">
                    <img src="<?php bloginfo('template_directory')?>/assets/images/rectangle_771.png" alt="plant4">
                </div>
                <div class="plant-name-share">
                    <div><p>Imperial Red</p></div>
                    <div class="social-share">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1249.svg" alt="Twitter">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1247.svg" alt="Pinterest">
                        <img src="<?php bloginfo('template_directory')?>/assets/images/group_1248.svg" alt="LinkedIn">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="pagination-container">
        <div class="page1 active"><a href="#" class="active">1</a></div>
        <div class="page2"><a href="#">2</a></div>
        <div class="page3"><a href="#">3</a></div>
        <div><a href="#" class="single-right-caret">&#8250;</a></div>
        <div><a href="#" class="double-right-caret">&raquo;</a></div>
    </div>
    <div class="back-to-top">
        <button onclick="topFunction()" class="back-to-top-button" title="Go to top">BACK TO TOP</button>
    </div>
</main>

<?php
    get_template_part('template-parts/content', 'footer');
?>
