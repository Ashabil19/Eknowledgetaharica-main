
<!-- bagian ini berfungsi untuk menginsert function function wordpress maupun custom -->



<?php 
    // Fungsi untuk mendaftarkan dan memasukkan Bootstrap CSS
    function loadCss() {


        wp_register_style('bootstrap' , get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
        wp_enqueue_style("bootstrap");

        wp_register_style('main' , get_template_directory_uri() . './css/main.css', array(), false, 'all');
        wp_enqueue_style("main");
    }
    add_action('wp_enqueue_scripts', 'loadCss');

    // Fungsi untuk memasukkan jQuery dan mendaftarkan/memasukkan Bootstrap JS
    function loadJS() {
        wp_enqueue_script('jquery'); // Memasukkan jQuery (sudah disertakan oleh WordPress) // Wordpress akan otomatis mengetahui file Jquery
        wp_register_script('bootstrap' , get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), false, true);
        wp_enqueue_script("bootstrap");
    }
    add_action('wp_enqueue_scripts', 'loadJS');





    // theme options
    add_theme_support('menus');



    // menus
    register_nav_menus(
        array(
            'top-menu' => 'Top Menu Location',
            'mid-menu' => 'Mid Menu Location',
            'Mobile-menu' => 'Mobile Menu Location',
            'footer-menu' => 'Footer Menu Location',
        )
    );

?>

