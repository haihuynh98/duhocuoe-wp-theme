<?php

// Our custom post type function
function create_counselors_posttype()
{

    register_post_type('counselors',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('Counselors'),
                'singular_name' => __('Counselors'),
                'add_new' => __('Add New Counselor', 'textdomain'),
                'add_new_item' => __('Add New Counselor', 'textdomain'),
                'new_item' => __('New Counselor', 'textdomain'),
                'add_new_item' => __('Add New Counselor', 'textdomain'),
                'new_item' => __('New Counselor', 'textdomain'),
                'edit_item' => __('Edit Counselor', 'textdomain'),
                'view_item' => __('View Counselor', 'textdomain'),
                'all_items' => __('All Counselors', 'textdomain'),
                'search_items' => __('Search Counselors', 'textdomain'),
            ),
            'description' => __('Counselors listing', 'twentytwentyone'),
            // Features this CPT supports in Post Editor
            'supports' => array('title', 'thumbnail', 'revisions'),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'counselors'),
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-businessman'
        )
    );
}

// Hooking up our function to theme setup
add_action('init', 'create_counselors_posttype');

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
}


function getCounselorsListing($containerClass = 'container-clients', $itemClass = 'item-counselor')
{
    $args = array('post_type' => 'counselors', 'posts_per_page' => 10);
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

add_action('getCounselorsListing', 'getCounselorsListing');


function getCounselorsListingArray()
{
    $args = array('post_type' => 'counselors', 'posts_per_page' => -1);
    $the_query = new WP_Query($args);

    $result = [];

    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $result[] = [
                'photo' => get_the_post_thumbnail_url(),
                'name' => get_the_title(),
                'position' => get_post_meta(get_the_ID(), '_tg_counselor_position', true)
            ];
        }
        wp_reset_postdata();
    }

    return $result;
}


/**
 * Khai báo meta box
 **/
function counselor_meta_box()
{
    $screen = get_current_screen();
    if (($screen->post_type == 'counselors')) {
        add_meta_box('counselor-info', 'Counselor info', 'render_form_counselor', 'counselors', 'normal', 'high');
    }
}

add_action('add_meta_boxes', 'counselor_meta_box');


/**
 * @param $post
 * @return void
 */
function render_form_counselor($post): void
{
    $position = get_post_meta($post->ID, '_tg_counselor_position', true);

    echo('<table class="form-table" role="presentation">');
    echo('<tbody>');


    echo('<tr>');
    echo('<th scope="row"><label for="tg_counselor_position">Position</label></th>');
    echo('<td>');
    echo('<input type="text" id="tg_counselor_position" name="tg_counselor_position" value="' . esc_attr($position) . '" style="width:100%" />');
    echo('</td></tr>');

    echo('</tbody>');
    echo('</table>');
}

function counselor_meta_box_save($post_id)
{
    if (isset($_POST['tg_counselor_position'])) {
        update_post_meta($post_id, '_tg_counselor_position', $_POST['tg_counselor_position']);
    }

}

add_action('save_post', 'counselor_meta_box_save');