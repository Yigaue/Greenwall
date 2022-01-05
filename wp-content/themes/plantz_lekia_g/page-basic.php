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
    <section class="basic-section-1">
        <div class="indoor-plants-container">
            <div class="indoor-plants-text">
                <h4 class="indoor-plant-caption">indoor plants</h4>
                <h1 class="indoor-title">The Benefits of Indoor Plants</h1>
                <p class="p1">Spreading happiness to our customers’ interior spaces is what we do. From a small desktop plant to a towering atrium, from a sophisticated law office to a vibrant auto showroom, and from a healing hospital environment to a lively hotel lobby, PLANTZ has you covered in green indoor plants.</p>
                <p class="p2">Live plants can brighten any hotel lobby, office space, or restaurant, and offer many healthful benefits. The biophilic properties of plants are proven to alleviate stress, inspire productivity, and create a more healthful work atmosphere. Indoor plants in hospitality and retail settings are also proven to increase the perceived value of the surrounding products and services. In addition to looking good and making people happy, indoor plants also:</p>
                <div class="indoor-plant-contact"><p>CONTACT US</p></div>
            </div>
            <div class="indoor-image-collection">
                <div class="indoor-image1"></div>
                <div class="indoor-image2"></div>
                <div class="indoor-image3"></div>
            </div>
        </div>
    </section>
    <section class="indoor-section2">
        <div class="indoor-section2-container">
            <div class="indoor-section2-image"></div>
            <div class="indoor-section2-text">
                <p class="ind-sec2-p1">
                    <b>Help people breathe easier.</b> – When you breathe, your body is inhaling oxygen and exhaling carbon dioxide. During photosynthesis, plants do the opposite by absorbing carbon dioxide and releasing oxygen. This opposite pattern of gas use makes plants and human beings perfect partners for sharing indoor spaces. 
                </p>
                <p class="ind-sec2-p2">
                    <b>Purify the air.</b> – According to research conducted by NASA, plants are known to remove up to 87 percent of volatile organic compounds, or VOCs, every 24 hours. These potentially harmful airborne toxins include substances such as formaldehyde, which may be found in everything from cigarette smoke, to vinyl, grocery bags, and rugs, as well as benzene and trichloroethylene. Climate-controlled, airtight buildings are known to trap these harmful pollutants, which is why it is so important to include plants in the spaces. Indoor plants purify the air by pulling contaminants into the soil, where root-zone microorganisms convert them into food for the plant. 
                </p>
                <p class="ind-sec2-p3">
                    <b>Improve health and sharpen focus.</b> – Recent studies have proved that adding indoor plants to hospital rooms speed up the recovery rates of surgical patients. Adding plants to an office or workplace setting not only decreases fatigue, but also reduces the amounts of colds, coughs, and sore throats that get passed around the office. Plants are also known to increase attentiveness and focus in classrooms and offices. 
                </p>
                <h3 class="ind-sec2-h3">
                    The PLANTZ Indoor Plants Promise
                </h3>
                <p class="ind-sec2-p4">
                    We are uniquely positioned to provide plant programs that meet any budget or design challenge. From long-term rental programs, with low up-front costs, to sales and ongoing care, the PLANTZ team has delivered for over 30 years. We have certified technicians working in concert with an award-winning design team to produce looks that range from modest to cutting-edge. Let PLANTZ convey your image with a living testament to your corporate commitment to the environment, your staff, and your customers. 
                </p>
                <p class="ind-sec2-p5">
                    While neat-looking, cultured plants are always the result of our work, service is the promise we keep to get them that way. It is the intangible piece of our work and the spirit to serve that drives our days and creates the PLANTZ difference. Although our work is simple in compared to the brilliant work of our customers, we believe our service somehow contributes to the well being of humanity and makes the world a better, and happier place.
                </p>
            </div>
        </div>
    </section>
    
    <?php  get_footer() ?>

    <section class="check-out-catalogs">
        <h2>Check Out a Few of Our Favorite Indoor Plants</h2>
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
        </div>
    </section>
</main>

<?php get_template_part('template-parts/content', 'footer'); ?>