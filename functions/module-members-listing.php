<?php

// Our custom post type function
function create_members_posttype()
{

    register_post_type('members',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('Members'),
                'singular_name' => __('Members'),
                'add_new'               => __( 'Add New Member', 'textdomain' ),
                'add_new_item'          => __( 'Add New Member', 'textdomain' ),
                'new_item'              => __( 'New Member', 'textdomain' ),
                'add_new_item'          => __( 'Add New Member', 'textdomain' ),
                'new_item'              => __( 'New Member', 'textdomain' ),
                'edit_item'             => __( 'Edit Member', 'textdomain' ),
                'view_item'             => __( 'View Member', 'textdomain' ),
                'all_items'             => __( 'All Members', 'textdomain' ),
                'search_items'          => __( 'Search Members', 'textdomain' ),
            ),
            'description' => __('Members listing', 'twentytwentyone'),
            // Features this CPT supports in Post Editor
            'supports' => array('title', 'editor', 'thumbnail', 'revisions'),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'members'),
            'show_in_rest' => true,
            'menu_icon'=> 'dashicons-groups'
        )
    );
}

// Hooking up our function to theme setup
add_action('init', 'create_members_posttype');

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
}


function getMembersListing($containerClass = 'container-clients', $itemClass = 'item-member')
{
    $args = array('post_type' => 'members', 'posts_per_page' => 10);
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

add_action('getMembersListing', 'getMembersListing');


function getMembersListingArray()
{
    $args = array('post_type' => 'members', 'posts_per_page' => -1);
    $the_query = new WP_Query($args);

    $result = [];

    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $result[]= [
                'photo' => get_the_post_thumbnail_url(),
                'name' => get_the_title(),
                'content' => get_the_content()
            ];
        }
        wp_reset_postdata();
    }

    return $result;
}