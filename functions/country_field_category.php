<?php
//add extra fields to category edit form hook
add_action('category_add_form_fields', 'add_active_country_category');
add_action('edit_category_form_fields', 'add_active_country_category');
//add extra fields to category edit form callback function
function add_active_country_category($tag)
{    //check for existing featured ID
    $t_id = $tag->term_id;
    $is_country_cat_meta = get_option("is_country_category_$t_id");
    ?>
    <div class="form-field term-description-wrap">
        <tr class="form-field">
            <th scope="row" valign="top"><label for="isCountry"><?php _e('Country'); ?></label></th>
            <td>
                <input type="checkbox" name="is_country"
                       id="isCountry" <?php echo $is_country_cat_meta == 1 ? 'checked' : ''; ?>>
                <span class="description"><?php _e('Active if this is a country'); ?></span>
            </td>
        </tr>
    </div>

    <?php
}

add_action('category_add_form_fields', 'add_field_school');
add_action('edit_category_form_fields', 'add_field_school');

function add_field_school($tag)
{    //check for existing featured ID
    $t_id = $tag->term_id;
    $taxonomy = 'category';
    if (term_exists('truong', $taxonomy)) {
        $catSchool = get_cat_ID('truong');

        $categories = get_categories(
            array('parent' => $catSchool, 'hide_empty' => 0)
        );

    }
    $school_cat_metas = explode(',', get_option("schools_category_$t_id"));
    ?>

    <div class="form-field term-school-wrap">
        <tr class="form-field">
            <th scope="row" valign="top"><label for="School_list"><?php _e('Schools list'); ?></label></th>
            <td>
                <table>
                    <?php foreach ($categories as $cat) :
                        $checked = '';
                        if (in_array($cat->term_id, $school_cat_metas)) {
                            $checked = 'checked';
                        }
                        ?>
                        <tr>
                            <td style="padding: 0px">
                                <input type="checkbox" name="schools_cat[]" id="School_list"
                                       value="<?php echo $cat->term_id ?>" <?php echo $checked ?>>
                                <span class="school-name"><?php echo $cat->name ?></span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </td>
        </tr>

    </div>

    <?php
}


// save extra category extra fields hook
add_action('edited_category', 'save_is_country_category_fileds');
add_action('create_category', 'save_is_country_category_fileds');
function save_is_country_category_fileds($term_id)
{
    $t_id = $term_id;

    if (isset($_POST['is_country'])) {
        $valueTermMeta = $_POST['is_country'] == 'on' ? 1 : 0;
        update_option("is_country_category_$t_id", $valueTermMeta);
    } else {
        if (!empty(get_option("is_country_category_$t_id"))) {
            delete_option("is_country_category_$t_id");
        }
    }
}

// save extra category extra fields hook
add_action('edited_category', 'save_school_category_fileds');
add_action('create_category', 'save_school_category_fileds');
function save_school_category_fileds($term_id)
{
    $t_id = $term_id;
    if (isset($_POST['schools_cat'])) {
        $valueTermMeta = $_POST['schools_cat'];
        update_option("schools_category_$t_id", implode(',', $valueTermMeta));
    } else {
        if (!empty(get_option("schools_category_$t_id"))) {
            delete_option("schools_category_$t_id");
        }
    }
}

add_action('category_edit_form_fields', 'update_category_image', 10, 2);
function update_category_image($term, $taxonomy)
{ ?>
    <tr class="form-field term-group-wrap">
        <th scope="row">
            <label for="banner_cat"><?php _e('Banner', 'text-domain'); ?></label>
        </th>
        <td>

            <?php $banner_cat = get_term_meta($term->term_id, 'banner_cat', true); ?>
            <input type="hidden" id="banner_cat" name="banner_cat" value="<?php echo $banner_cat; ?>">

            <div id="image_wrapper">
                <?php if ($banner_cat) { ?>
                    <?php echo wp_get_attachment_image($banner_cat, 'thumbnail'); ?>
                <?php } ?>
            </div>

            <p>
                <input type="button" class="button button-secondary taxonomy_media_button" id="taxonomy_media_button"
                       name="taxonomy_media_button" value="<?php _e('Add Image', 'text-domain'); ?>">
                <input type="button" class="button button-secondary taxonomy_media_remove" id="taxonomy_media_remove"
                       name="taxonomy_media_remove" value="<?php _e('Remove Image', 'text-domain'); ?>">
            </p>
            <br>
            <?php $direct_link = get_term_meta($term->term_id, 'direct_link', true); ?>
            <p>Direct link (option)</p>
            <input type="text" name="direct_link" id="direct_link" pattern="https?://.*" placeholder="Enter a link" value="<?= $direct_link?>">
            <p class="description">The link must be with format of 'https' or 'http'</p>

            </div></td>
    </tr>
    <?php
}

add_action('category_add_form_fields', 'add_category_image', 10, 2);
function add_category_image($taxonomy)
{
    ?>
    <div class="form-field term-group">

        <label for="banner_cat"><?php _e('Image', 'text-domain'); ?></label>
        <input type="hidden" id="banner_cat" name="banner_cat" class="custom_media_url" value="">

        <div id="image_wrapper"></div>

        <p>
            <input type="button" class="button button-secondary taxonomy_media_button" id="taxonomy_media_button"
                   name="taxonomy_media_button" value="<?php _e('Add Image', 'text-domain'); ?>">
            <input type="button" class="button button-secondary taxonomy_media_remove" id="taxonomy_media_remove"
                   name="taxonomy_media_remove" value="<?php _e('Remove Image', 'text-domain'); ?>">
        </p>

        <br>
        <p>Direct link (option)</p>
        <input type="text" name="direct_link" id="direct_link" pattern="https?://.*" placeholder="Enter a link">
        <p class="description">The link must be with format of 'https' or 'http'</p>

    </div>
    <?php
}

add_action('created_category', 'save_category_image', 10, 2);
function save_category_image($term_id, $tt_id)
{
    if (isset($_POST['banner_cat']) && '' !== $_POST['banner_cat']) {
        $image = $_POST['banner_cat'];
        add_term_meta($term_id, 'category_banner_cat', $image, true);


        if (isset($_POST['direct_link']) && '' !== $_POST['direct_link']) {
            update_term_meta($term_id, 'direct_link', $_POST['direct_link']);
        }
    }

}

add_action('edited_category', 'updated_category_image', 10, 2);
function updated_category_image($term_id, $tt_id)
{
    if (isset($_POST['banner_cat']) && '' !== $_POST['banner_cat']) {
        $image = $_POST['banner_cat'];
        update_term_meta($term_id, 'banner_cat', $image);

        if (isset($_POST['direct_link']) && '' !== $_POST['direct_link']) {
            update_term_meta($term_id, 'direct_link', $_POST['direct_link']);
        } else {
            update_term_meta($term_id, 'direct_link', '');
        }
    } else {
        update_term_meta($term_id, 'banner_cat', '');
        update_term_meta($term_id, 'direct_link', '');
    }


}

add_filter('manage_edit-category_columns', 'display_image_column_heading');
function display_image_column_heading($columns)
{
    $columns['category_image'] = __('Banner', 'text-domain');
    return $columns;
}

add_action('manage_category_custom_column', 'display_image_column_value', 10, 3);
function display_image_column_value($columns, $column, $id)
{
    if ('category_image' == $column) {
        $banner_cat = esc_html(get_term_meta($id, 'banner_cat', true));

        $columns = wp_get_attachment_image($banner_cat, array('50', '50'));
    }
    return $columns;
}

add_action('admin_enqueue_scripts', 'load_media');
function load_media()
{
    wp_enqueue_media();
}

add_action('admin_footer', 'add_custom_script');
function add_custom_script()
{
    ?>
    <script>jQuery(document).ready(function ($) {
            function taxonomy_media_upload(button_class) {
                var custom_media = true,
                    original_attachment = wp.media.editor.send.attachment;
                $('body').on('click', button_class, function (e) {
                    var button_id = '#' + $(this).attr('id');
                    var send_attachment = wp.media.editor.send.attachment;
                    var button = $(button_id);
                    custom_media = true;
                    wp.media.editor.send.attachment = function (props, attachment) {
                        if (custom_media) {
                            $('#banner_cat').val(attachment.id);
                            $('#image_wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
                            $('#image_wrapper .custom_media_image').attr('src', attachment.url).css('display', 'block');
                        } else {
                            return original_attachment.apply(button_id, [props, attachment]);
                        }
                    }
                    wp.media.editor.open(button);
                    return false;
                });
            }

            taxonomy_media_upload('.taxonomy_media_button.button');
            $('body').on('click', '.taxonomy_media_remove', function () {
                $('#banner_cat').val('');
                $('#image_wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
            });

            $(document).ajaxComplete(function (event, xhr, settings) {
                var queryStringArr = settings.data.split('&');
                if ($.inArray('action=add-tag', queryStringArr) !== -1) {
                    var xml = xhr.responseXML;
                    $response = $(xml).find('term_id').text();
                    if ($response != "") {
                        $('#image_wrapper').html('');
                    }
                }
            });
        });</script> <?php
}