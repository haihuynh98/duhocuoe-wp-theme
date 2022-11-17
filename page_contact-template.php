<?php

/*
Template Name: Contact template
*/
get_header();

$pageID = get_the_ID();

$address = get_post_meta( $pageID, '_ct_address', true );
$short_code_cf7 = get_post_meta($pageID, '_ct_short_code_cf7', true);
$phone = get_post_meta($pageID, '_ct_phone', true);
$email = get_post_meta($pageID, '_ct_email', true);
$fanpages = get_post_meta($pageID, '_ct_fanpages', true);
$banner = wp_get_attachment_url( get_post_meta($pageID, '_project_banner_img', true));

$gmap = get_post_meta($pageID, '_ct_iframe_gmap', true);
?>

<main id="site-content">



    <section class="u-clearfix u-grey-90 u-valign-middle-md u-section-1" id="carousel_09f3">
        <img class="u-expanded-width u-image u-image-1" src="<?php echo $banner?>" data-image-width="1080" data-image-height="1080">
        <div class="u-list u-list-1">
            <div class="u-repeater u-repeater-1">
                <div class="u-align-center u-container-style u-list-item u-opacity u-opacity-95 u-radius-5 u-repeater-item u-shape-round u-white u-list-item-1">
                    <div class="u-container-layout u-similar-container u-valign-middle u-container-layout-1">
                        <h5 class="u-text u-text-1">Văn phòng</h5>
                        <p class="u-text u-text-grey-75 u-text-2"> <?php echo $address?>
                        </p>
                    </div>
                </div>
                <div class="u-align-center u-container-style u-list-item u-opacity u-opacity-95 u-radius-5 u-repeater-item u-shape-round u-white u-list-item-2">
                    <div class="u-container-layout u-similar-container u-valign-middle u-container-layout-2">
                        <h5 class="u-text u-text-3">liên hệ</h5>
                        <p class="u-text u-text-grey-75 u-text-4"><?php echo $phone?>
                        </p>
                    </div>
                </div>
                <div class="u-align-center u-container-style u-list-item u-opacity u-opacity-95 u-radius-5 u-repeater-item u-shape-round u-white u-list-item-3">
                    <div class="u-container-layout u-similar-container u-valign-middle u-container-layout-3">
                        <h5 class="u-text u-text-5">Email</h5>
                        <p class="u-text u-text-grey-75 u-text-6" autocomplete="off">
                            <a href="mailto:<?php echo $email?>" class="u-active-none u-border-1 u-border-active-black u-border-hover-black u-border-palette-4-dark-2 u-btn u-button-link u-button-style u-hover-none u-none u-text-active-black u-text-hover-black u-text-palette-4-dark-1 u-btn-1"><?php echo $email?></a>
                        </p>
                    </div>
                </div>
                <div class="u-align-center u-container-style u-list-item u-opacity u-opacity-95 u-radius-5 u-repeater-item u-shape-round u-white u-list-item-4">
                    <div class="u-container-layout u-similar-container u-valign-middle u-container-layout-4">
                        <h5 class="u-text u-text-7">fanpage</h5>
                        <p class="u-text u-text-grey-75 u-text-8"><?php echo $fanpages?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
            <div class="u-layout">
                <div class="u-layout-row">
                    <div class="u-align-left u-container-style u-grey-60 u-layout-cell u-left-cell u-opacity u-opacity-75 u-size-30 u-layout-cell-1">
                        <div class="u-container-layout u-container-layout-5">
                            <h3 class="u-text u-text-body-alt-color u-text-default u-text-9">Thông tin liên hệ</h3>
                            <div class="u-expanded-width-sm u-expanded-width-xs u-form u-form-1">
                                <?php echo do_shortcode($short_code_cf7)?>

                            </div>
                        </div>
                    </div>
                    <div class="u-black u-container-style u-layout-cell u-right-cell u-size-30 u-layout-cell-2">
                        <div class="u-container-layout u-container-layout-6">
                            <div class="u-expanded u-grey-light-2 u-map">
                                <div class="embed-responsive">
                                    <?php echo $gmap?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php

    if (have_posts()) {

        while (have_posts()) {
            the_post();

            get_template_part('template-parts/content-cover');
        }
    }

    ?>

</main><!-- #site-content -->

<?php get_template_part('template-parts/footer-menus-widgets'); ?>

<?php get_footer(); ?>
