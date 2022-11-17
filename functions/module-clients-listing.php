<?php

// Our custom post type function
function create_clients_posttype()
{

    register_post_type('clients',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('Clients'),
                'singular_name' => __('Clients'),
                'add_new'               => __( 'Add New Client', 'textdomain' ),
                'add_new_item'          => __( 'Add New Client', 'textdomain' ),
                'new_item'              => __( 'New Client', 'textdomain' ),
                'add_new_item'          => __( 'Add New Client', 'textdomain' ),
                'new_item'              => __( 'New Client', 'textdomain' ),
                'edit_item'             => __( 'Edit Client', 'textdomain' ),
                'view_item'             => __( 'View Client', 'textdomain' ),
                'all_items'             => __( 'All Clients', 'textdomain' ),
                'search_items'          => __( 'Search Clients', 'textdomain' ),
            ),
            'description' => __('Clients listing', 'twentytwentyone'),
            // Features this CPT supports in Post Editor
            'supports' => array('title', 'thumbnail', 'revisions'),
            'taxonomies' => array('genres'),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'clients'),
            'show_in_rest' => true,
        )
    );
}

// Hooking up our function to theme setup
add_action('init', 'create_clients_posttype');

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
}


function getClientsListing($containerClass = 'container-clients', $itemClass = 'item-client')
{
    $args = array('post_type' => 'clients', 'posts_per_page' => 10);
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

add_action('getClientsListing', 'getClientsListing');


function getClientsListingArray()
{
    $args = array('post_type' => 'clients', 'posts_per_page' => -1);
    $the_query = new WP_Query($args);

    $result = [];

    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $result[]= [
                'logo' => get_the_post_thumbnail_url(),
                'name' => get_the_title(),
            ];
        }
        wp_reset_postdata();
    }

    return $result;
}