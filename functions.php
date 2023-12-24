<?php
function techblend()
{

    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css', array(), '1.0.0', 'all');

    wp_enqueue_script('jquery-js', get_template_directory_uri() . '/assets/jquery/jquery.min.js', array(), '1.1.0', true);
    wp_enqueue_script('slick-min', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.9.1', true);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array(), '1.0.0', true);


    wp_enqueue_style('customstyle', get_template_directory_uri() . '/assets/css/main.min.css', array(), '1.0.0', 'all');
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array(), '3.1.0', true);
}
add_action('wp_enqueue_scripts', 'techblend');




add_theme_support("post-thumbnails");

add_theme_support('custom-logo');


function techblend_custom_logo_setup()
{
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array('site-title', 'site-description'),
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'techblend_custom_logo_setup');

register_nav_menus(array(
    'main_menu' => __('Main Navigation'),
    'secondary' => __('Secondary Navigation')
));



function techblend_widget()
{
    register_sidebar(array(
        'name' => 'Address',
        'id' => 'address_footer',
    ));

    register_sidebar(array(
        'name' => 'Phone Number',
        'id' => 'phone_footer',
    ));

    register_sidebar(array(
        'name' => 'E-Mail',
        'id' => 'email_footer',
    ));

    register_sidebar(array(
        'name' => 'Contact Form',
        'id' => 'contact_form',
    ));
    register_sidebar(array(
        'name' => 'Contact Form',
        'id' => 'contact_form',
    ));

    register_sidebar(array(
        'name' => 'Copyright',
        'id' => 'copyright',
    ));

    register_sidebar(array(
        'name' => 'Social Media',
        'id' => 'social',
    ));

    

}
add_action('widgets_init', 'techblend_widget');





function news_post_type()
{
    $labels = array(
        'name' => 'News posts',
        'singular_name' => 'News Post',
        'add_new' => 'Add News',
        'all_items' => 'All News',
        'add_new_item' => 'Add News',
        'edit_item' => 'Edit News',
        'new_item' => 'New News',
        'view_item' => 'View Item',
        'search_item' => 'Search News',
        'not_found' => 'No News found',
        'not_found_in_trash' => 'No News found in trash',
        'parent_item_colon' => 'Parent News'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queruable' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-screenoptions',
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
        ),
        'menu_position' => 6,
    );
    register_post_type('news', $args);
}
add_action('init', 'news_post_type');



function testimonial_post_type()
{
    $labels = array(
        'name' => 'Testimonial posts',
        'singular_name' => 'Testimonial Post',
        'add_new' => 'Add Testimonial',
        'all_items' => 'All Testimonial',
        'add_new_item' => 'Add Testimonial',
        'edit_item' => 'Edit Testimonial',
        'new_item' => 'New Testimonial',
        'view_item' => 'View Item',
        'search_item' => 'Search Testimonial',
        'not_found' => 'No Testimonial found',
        'not_found_in_trash' => 'No Testimonial found in trash',
        'parent_item_colon' => 'Parent Testimonial'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queruable' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-screenoptions',
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
        ),
        'menu_position' => 6,
    );
    register_post_type('testimonial', $args);
}
add_action('init', 'testimonial_post_type');

function product_post_type()
{
    $labels = array(
        'name' => 'Product posts',
        'singular_name' => 'Product Post',
        'add_new' => 'Add Product',
        'all_items' => 'All Product',
        'add_new_item' => 'Add Product',
        'edit_item' => 'Edit Product',
        'new_item' => 'New Product',
        'view_item' => 'View Item',
        'search_item' => 'Search Product',
        'not_found' => 'No Product found',
        'not_found_in_trash' => 'No Product found in trash',
        'parent_item_colon' => 'Parent Product'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queruable' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-screenoptions',
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
        ),
        'menu_position' => 6,
    );
    register_post_type('product', $args);
}
add_action('init', 'product_post_type');

// Register Custom Taxonomy
function product_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Features', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Feature', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Features', 'text_domain' ),
        'all_items'                  => __( 'All Features', 'text_domain' ),
        'parent_item'                => __( 'Parent Feature', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Feature:', 'text_domain' ),
        'new_item_name'              => __( 'New Feature Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New Feature', 'text_domain' ),
        'edit_item'                  => __( 'Edit Feature', 'text_domain' ),
        'update_item'                => __( 'Update Feature', 'text_domain' ),
        'view_item'                  => __( 'View Feature', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate features with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove features', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Features', 'text_domain' ),
        'search_items'               => __( 'Search Features', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No features', 'text_domain' ),
        'items_list'                 => __( 'Features list', 'text_domain' ),
        'items_list_navigation'      => __( 'Features list navigation', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'features', array( 'product' ), $args );

}
add_action( 'init', 'product_taxonomy', 0 );
