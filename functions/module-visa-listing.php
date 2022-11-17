<?php

// Our custom post type function
function create_visas_posttype()
{

    register_post_type('visas',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('Visas'),
                'singular_name' => __('Visas'),
                'add_new'               => __( 'Add New Visa', 'textdomain' ),
                'add_new_item'          => __( 'Add New Visa', 'textdomain' ),
                'new_item'              => __( 'New Visa', 'textdomain' ),
                'add_new_item'          => __( 'Add New Visa', 'textdomain' ),
                'new_item'              => __( 'New Visa', 'textdomain' ),
                'edit_item'             => __( 'Edit Visa', 'textdomain' ),
                'view_item'             => __( 'View Visa', 'textdomain' ),
                'all_items'             => __( 'All Visas', 'textdomain' ),
                'search_items'          => __( 'Search Visas', 'textdomain' ),
            ),
            'description' => __('Visas listing', 'twentytwentyone'),
            // Features this CPT supports in Post Editor
            'supports' => array('title', 'thumbnail', 'revisions'),
            'taxonomies' => array('genres'),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'visas'),
            'show_in_rest' => true,
            'menu_icon'=> 'dashicons-megaphone'
        )
    );
}

// Hooking up our function to theme setup
add_action('init', 'create_visas_posttype');

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
}


function getVisasListing($containerClass = 'container-visas', $itemClass = 'item-Visa')
{
    $args = array('post_type' => 'visas', 'posts_per_page' => 10);
    $the_query = new WP_Query($args);

    if ($the_query->have_posts()) {
        echo '<div class="' . $containerClass . '">';
        while ($the_query->have_posts()) {
            $the_query->the_post();
            echo '<div class="' . $itemClass . '">';
            echo the_post_thumbnail('full');
            echo '</div>';
        }
        wp_reset_postdata();
        echo '</div>';
    }
}

add_action('getVisasListing', 'getVisasListing');


function getVisasListingArray()
{
    $args = array('post_type' => 'visas', 'posts_per_page' => -1);
    $the_query = new WP_Query($args);

    $result = [];

    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $result[]= [
                'logo' => get_the_post_thumbnail_url(get_the_ID(),'thumbnail'),
                'name' => get_the_title(),
            ];
        }
        wp_reset_postdata();
    }

    return $result;
}