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
    <section class="section-1">
        <div class="section-1-container">
            <div class="image-container-carousel">
                <div class="image-carousel img1">
                    <img src="<?php bloginfo('template_directory')?>/assets/images/group_2.png" alt="plant 1">
                </div>
                <div class="w3-center">
                    <span class="w3-badge demo" onclick="currentDiv(1)" style="background-color: #254D1B"></span>
                    <span class="w3-badge demo" onclick="currentDiv(2)"></span>
                    <span class="w3-badge demo" onclick="currentDiv(3)"></span>
                    <span class="w3-badge demo" onclick="currentDiv(3)"></span>
                </div>
            </div>
            <div class="left-right-arrow">
                <div class="left-arrow">
                    <img src="<?php bloginfo('template_directory')?>/assets/images/path_3015.svg" alt="left arrow">
                </div>
                <div class="right-arrow">
                    <img src="<?php bloginfo('template_directory')?>/assets/images/path_3015.svg" alt="right arrow">
                </div>
            </div>
            <div class="wrapper">
                <div class="container-background-plant"></div>
                <div class="plant-details">
                    <div class="plant-description">
                        <h1>
                            LOREM IMPSUM IS <span class="simply">SIMPLY</span> DUMMY
                        </h1>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In mollis est nec nunc varius venenatis. Curabitur bibendum sem vel nunc blandit, a porttitor felis lacinia. Curabitur vitae congue massa, at sodales nunc. Maecenas et arcu vestibulum, suscipit felis at, efficitur enim. Curabitur consectetur felis in elit aliquam mattis ac non justo.
                        </p>
                    </div>
                    <div class="check-catalog">
                        <div class="checkout-info">
                            CHECK OUT OUR CATALOG OF PLANTS PERFECT FOR YOUR OFFICE, BUSINESS OR SPECIAL EVENT
                        </div>
                        <div class="catalog-button">CATALOG
                            <img src="<?php bloginfo('template_directory')?>/assets/images/path_3015.svg" alt="right arrow"> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mission">
        <div class="section-2-container">
            <div class="wrapper">
                <div class="container-background-plant"></div>
                <div class="our-mission">
                    <div class="mission-text">
                        <h2>OUR MISSION</h2>
                        <p>Our mission is simple – To make people happy with plants. There is a distinctive bond between human beings and other living systems. It’s called biophilia, and it is an innate urge to affiliate with other forms of life. Literally, biophilia means “love of life or living systems”. In a small way, be believe that we enhance the bond between people and plants; all kinds of plants – indoors and out, small and large, green and colorful. Developing and enhancing this bond, between people and our oxygen-producing friends, is at the heart of our mission. In the pursuit of our mission, we have developed service and delivery programs for plants of all sizes, types, and adaptations.</p>
                    </div>
                    <div class="contact-us-button">CONTACT US</div>
                </div>
            </div>
            <div class="mission-image">
                <img src="<?php bloginfo('template_directory')?>/assets/images/image_1.png" alt="right arrow">
            </div>
        </div>
    </section>
    <section class="services">
        <div class="our-service-title"><h2>OUR SERVICES</h2></div>
        <div class="section-3-container">
            <div class="our-service">
                <div class="service-text">
                    <img src="<?php bloginfo('template_directory')?>/assets/images/group_1178.svg" alt="Buy a Plant" style="height: 22px; width: 22px; padding-right: 2px;">
                    <h2>Landscaping</h2>
                    <p>Plants in a well-organized, healthy looking landscape project a professional image and welcoming setting and spread happiness to your guests and visitors. Tight, manicured lawns; vibrant, colorful annual plantings; and neatly trimmed hedges and tress all work together to make great first impressions with a lasting impact.</p>
                </div>
                <div class="learn-more-link">Learn More <img src="<?php bloginfo('template_directory')?>/assets/images/path_3015.svg" alt="right arrow"></div>
            </div>
            <div class="service-image">
                <img src="<?php bloginfo('template_directory')?>/assets/images/mask_group_6@2x.png" alt="our service image">
            </div>
        </div>
        <div class="previous-next">
            <div class="previous"><p>previous</p></div>
            <div class="next"><p>next</p></div>
        </div>
    </section>
    <section class="news-events">
        <div class="news-event-background">
            <div class="news-event-title"><h2 class="title">news & event</h2></div>
            <div class="sliderContainer">
                <div class="news-carousel-container">
                    <div class="news-carousel">
                        <h4>02 JUL</h4>
                        <div class="section-4-container">
                            <div class="news-image">
                                <img src="<?php bloginfo('template_directory')?>/assets/images/rectangle_718.png" alt="news image 1">
                            </div>
                            <div class="news-content">
                                <div class="news-text">
                                    <h5>
                                        Go Boltz - and Let Lightning Strike Twice!
                                    </h5>
                                    <p>
                                        The PLANTZ team is geared up to support the Tampa Bay Lightning’s repeat quest for Lord Stanley’s Cup. Nothing like some …
                                    </p>
                                </div>
                                <div class="read-more-link">Read More <img src="<?php bloginfo('template_directory')?>/assets/images/path_3015.svg" alt="right arrow"></div>
                            </div>
                        </div>
                    </div>
                    <div class="news-carousel">
                        <h4>02 JUL</h4>
                        <div class="section-4-container">
                            <div class="news-image">
                                <img src="<?php bloginfo('template_directory')?>/assets/images/rectangle_718.png" alt="news image 1">
                            </div>
                            <div class="news-content">
                                <div class="news-text">
                                    <h5>
                                        Go Boltz - and Let Lightning Strike Twice!
                                    </h5>
                                    <p>
                                        The PLANTZ team is geared up to support the Tampa Bay Lightning’s repeat quest for Lord Stanley’s Cup. Nothing like some …
                                    </p>
                                </div>
                                <div class="read-more-link">Read More <img src="<?php bloginfo('template_directory')?>/assets/images/path_3015.svg" alt="right arrow"></div>
                            </div>
                        </div>
                    </div>
                    <div class="news-carousel">
                        <h4>02 JUL</h4>
                        <div class="section-4-container">
                            <div class="news-image">
                                <img src="<?php bloginfo('template_directory')?>/assets/images/rectangle_718.png" alt="news image 1">
                            </div>
                            <div class="news-content">
                                <div class="news-text">
                                    <h5>
                                        Go Boltz - and Let Lightning Strike Twice!
                                    </h5>
                                    <p>
                                        The PLANTZ team is geared up to support the Tampa Bay Lightning’s repeat quest for Lord Stanley’s Cup. Nothing like some …
                                    </p>
                                </div>
                                <div class="read-more-link">Read More <img src="<?php bloginfo('template_directory')?>/assets/images/path_3015.svg" alt="right arrow"></div>
                            </div>
                        </div>
                    </div>
                    <div class="news-carousel">
                        <h4>02 JUL</h4>
                        <div class="section-4-container">
                            <div class="news-image">
                                <img src="<?php bloginfo('template_directory')?>/assets/images/rectangle_718.png" alt="news image 1">
                            </div>
                            <div class="news-content">
                                <div class="news-text">
                                    <h5>
                                        Go Boltz - and Let Lightning Strike Twice!
                                    </h5>
                                    <p>
                                        The PLANTZ team is geared up to support the Tampa Bay Lightning’s repeat quest for Lord Stanley’s Cup. Nothing like some …
                                    </p>
                                </div>
                                <div class="read-more-link">Read More <img src="<?php bloginfo('template_directory')?>/assets/images/path_3015.svg" alt="right arrow"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="controllers">
                    <button class="btn prevBtn"><i class="fas fa-chevron-left"></i></button>
                    <button class="btn nextBtn"><i class="fas fa-chevron-right"></i></button>
                </div>
                <div class="navigator"></div>
            </div>
        </div>
    </section>
    <section class="catalog">
        <div class="catalog-title"><h2>CATALOG</h2></div>
        <div class="section-5-container">
        <div class="container-background-plant"></div>
        <div class="wrapper">
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
        </div>
        <div class="container-background-plant2"></div>
        </div>
        <div class="view-all">
            <div class="catalog-button">
                VIEW ALL 
                <svg xmlns="http://www.w3.org/2000/svg" width="70.766" height="15.238" viewBox="0 0 18.766 10.238">
                <path id="Path_3015" data-name="Path 3015" d="M283.563,1233.923a.684.684,0,0,0,0-.973l-4.423-4.435a.711.711,0,0,0-.984,0,.7.7,0,0,0,0,.987l3.932,3.934-3.932,3.934a.7.7,0,0,0,0,.987.71.71,0,0,0,.984,0Zm-18.563.209h18.071v-1.39H265Z" transform="translate(-265 -1228.318)" fill="#80a868"/>
                </svg>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>