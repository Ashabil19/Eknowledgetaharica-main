<?php 
add_filter('show_admin_bar', '__return_false');

function load_css()
{
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', [], 1, 'all');
    wp_enqueue_style('bootstrap');
    wp_register_style('main', get_template_directory_uri() . '/css/main.css', [], 1, 'all');
    wp_enqueue_style('main');
}
add_action('wp_enqueue_scripts', 'load_css');

function load_js()
{
    wp_enqueue_script('jquery');
    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', ['jquery'], 1, true);
    wp_enqueue_script('bootstrap');
}
add_action('wp_enqueue_scripts', 'load_js');

register_nav_menus(array(
    'top-menu' => __('Top Menu', 'theme'),
    'footer-menu' => __('Footer Menu', 'theme'),
));

add_theme_support('menus');
add_theme_support('post-thumbnails');
add_image_size('small', 600, 600, false);

function count_post_views()
{
    if (is_single()) {
        global $post;
        $views = get_post_meta($post->ID, 'post_views', true);
        $views = $views ? $views : 0;
        $views++;
        update_post_meta($post->ID, 'post_views', $views);
    }
}
add_action('wp_head', 'count_post_views');

function custom_shortcode_function($atts)
{
    $site_url = site_url();
    $path = isset($atts['path']) ? $atts['path'] : '';
    $full_url = $site_url . $path;
    return $full_url;
}
add_shortcode('custom_link', 'custom_shortcode_function');

function custom_restrict_categories_for_role($args)
{
    if (is_user_logged_in()) {
        $current_user = wp_get_current_user();
        $user_role = $current_user->roles[0];
        switch ($user_role) {
            case 'it':
                $args['include'] = 'it';
                break;
            case 'engineering':
                $args['include'] = 'engineering';
                break;
            case 'sales':
                $args['include'] = 'sales';
                break;
            case 'hr':
                $args['include'] = 'hr';
                break;
        }
    }
    return $args;
}
add_filter('wp_dropdown_categories', 'custom_restrict_categories_for_role', 10, 1);



?>