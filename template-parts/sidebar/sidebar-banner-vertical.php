<?php
wp_reset_postdata();
$primaryCat = get_post_primary_category(get_the_ID());
$primary_category = $primaryCat['primary_category'];
?>

<?php if ($primary_category->term_id != 0 && $banner_cat = get_term_meta($primary_category->term_id, 'banner_cat', true)) : ?>
    <div id="sidebar-banner-vertical" class="sticky-top hide-tablet hide-mobile">
        <div class="widget image-banner">
            <?php if ($banner_cat) {
                $direct_link = get_term_meta($primary_category->term_id, 'direct_link', true) ?>
                <a href="<?= $direct_link ?>">
                    <?php echo wp_get_attachment_image($banner_cat, 'full'); ?>
                </a>
            <?php } ?>
        </div><!-- .Widget ends here -->
    </div>
<?php endif; ?>