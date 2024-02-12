<?php get_header();?>

    <div class="fullscreen taharica-bg">
    <div class="main d-flex justify-content-center align-items-center flex-column ">
        

        <section class="d-flex justify-content-start align-items-center flex-column container " style="height: 600px;">
            <h1 class="text-center text-light mb-custom heading-homepage rumah-toga">


                <!-- kurang Icon Toga  | Remark : Request ke Mas rayhan-->

                <!-- <toga> -->
                Taharica <br> e-Knowledge 
                <img src="<?php echo get_template_directory_uri(); ?> /assets/toga.png" alt="toga" class="toga" />
            </h1>
            

            <?php get_search_form();?>

            <ul class="navigation-menu">
                <li>
                    <a href="http://localhost/eknowledgetaharica/it/" class="d-flex justify-content-center align-items-center flex-column">
                        <img src="<?php echo get_template_directory_uri(); ?> /assets/it-icon.png" alt="img" class="img-fluid navigation-ball flexbox" />
                        <p class="text-center mt-2 navigation-text">IT</p>

                    </a>
                </li>
                  <li>
                    <a href="http://localhost/eknowledgetaharica/engineering/" class="d-flex justify-content-center align-items-center flex-column">
                        <img src="<?php echo get_template_directory_uri(); ?> /assets/engineering-icon.png" alt="img" class="img-fluid navigation-ball flexbox" />
                        <p class="text-center mt-2 navigation-text">Engineering</p>

                    </a>
                </li>
                  <li>
                    <a href="http://localhost/eknowledgetaharica/hr/" class="d-flex justify-content-center align-items-center flex-column">
                        <img src="<?php echo get_template_directory_uri(); ?> /assets/hrd-icon.png" alt="img" class=" img-fluid navigation-ball flexbox" />
                        <p class="text-center mt-2 navigation-text">HR</p>

                    </a>
                </li>
                  <li>
                    <a href="http://localhost/eknowledgetaharica/hadist/" class="d-flex justify-content-center align-items-center flex-column">
                        <img src="<?php echo get_template_directory_uri(); ?> /assets/hadist-icon.png" alt="img" class="img-fluid navigation-ball flexbox" />
                        <p class="text-center mt-2 navigation-text">Hadist</p>

                    </a>
                </li>
                  <li>
                    <a href="http://localhost/eknowledgetaharica/other/" class="">
                        <img src="<?php echo get_template_directory_uri(); ?> /assets/other-icon.png" alt="img" class="img-fluid navigation-ball flexbox" />
                        <p class="text-center mt-2 navigation-text">Other</p>

                    </a>
                </li>
            </ul>
        </section>
 







        
    </div>

    </div>
    






    
                <!-- function Default Wordpress -->
                <?php //the_title();?>
                <?php //if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php //the_content(); ?>
                <?php //endwhile; else: endif; ?>
<?php get_footer();?>