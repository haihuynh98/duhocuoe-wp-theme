<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 */

?>
<?php
$hideHeader = false; // default header is visible
global $hideFooter;
$hideFooter = false; // default footer is visible
$pageBlog = is_home();
$pagePost = is_single();
$page404 = is_404();
$pageLogin = is_wplogin();
$pageProducts = theme_woocommerce_enabled() ? is_shop() || is_product_category() : false;
$pageProduct = theme_woocommerce_enabled() ? is_product() : false;
$pageCart = theme_woocommerce_enabled() ? is_cart() : false;
$pageCheckout = theme_woocommerce_enabled() ? is_checkout() : false;
$defaultPath = $pageProducts || $pageProduct || $pageCart || $pageCheckout ? '/woocommerce' : '';
if ($pageBlog) {
    $template = 'blog';
}
if ($pagePost) {
    $template = 'post';
}
if ($page404) {
    $template = 'page404';
}
if ($pageLogin) {
    $template = 'pageLogin';
}
if ($pageProducts) {
    $template = 'products';
}
if ($pageProduct) {
    $template = 'product';
}
if ($pageCart) {
    $template = 'cart';
}
if ($pageCheckout) {
    $template = 'checkout';
}
$wpCustomTemplate = false;
global $isWpCustomTemplate, $blog_custom_template, $post_custom_template;
if ($isWpCustomTemplate) {
    $template = $blog_custom_template ? $blog_custom_template : $post_custom_template;
    if ($template) {
        $wpCustomTemplate = true;
    }
}
if ($pageBlog || $pagePost || $page404 || $pageLogin || $pageProducts || $pageProduct || $pageCart || $pageCheckout || $wpCustomTemplate) {
    $defaultName = $pageCart ? '‌shoppingCart' : $template;
    global ${$template . "_custom_template"};
    ${$template . "_custom_template"} = ${$template . "_custom_template"} ? ${$template . "_custom_template"} : $defaultName . 'Template';
    $customPath = $wpCustomTemplate ? $template : ${$template . "_custom_template"};
    $fileWithOptions = get_template_directory() . $defaultPath . '/template-parts/' . $customPath . '/custom-template-options.php';
    if (file_exists($fileWithOptions)) {
        include_once $fileWithOptions;
    }
} ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js"
                                      style="font-size:<?php echo apply_filters('theme_base_font_size', '16'); ?>px">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WN5RJC2');</script>
    <!-- End Google Tag Manager -->
    <meta name="facebook-domain-verification" content="q75wvmpa8nbdr8czdoqx981o1ty1pq" />

    <?php if (is_singular() && pings_open(get_queried_object())) : ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>


</head>

<body <?php body_class(); ?><?php body_style_attribute(); ?> <?php body_data_attributes(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WN5RJC2"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php
if (version_compare($wp_version, '5.2', '>=')) {
    wp_body_open();
} ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'educationwp'); ?></a>
    <header class="top-header" id="top_header">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12 col-logo">

                    <?php $logo = theme_get_logo(array(
                        'default_src' => "/images/avt-website-8-7951.png",
                        'default_url' => get_home_url()
                    ));
                    $url = stripos($logo['url'], 'http') === 0 ? esc_url($logo['url']) : $logo['url']; ?><a
                        <?php if (is_customize_preview()) echo 'data-default-src="' . esc_url($logo['default_src']) . '" '; ?>href="<?php echo $url; ?>">
                        <img <?php if ($logo['svg']) {
                            echo 'style="width:' . $logo['width'] . 'px"';
                        } ?>src="<?php echo esc_url($logo['src']); ?>" class="u-logo-image u-logo-image-1">
                    </a>
                </div>
                <div class="col-md-6 col-12">
                    <ul class="brand-contact">
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icon-04.png" alt="Phone">
                            <a href="tel:0941579922">0941.57.9922</a>
                        </li>
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icon-05.png" alt="email">
                            <a href="mailto:shirley@duhocuoe.edu.vn">Shirley@duhocuoe.edu.vn</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-xl-9 col-lg-10 col-md-6 col-2">
                            <nav class="u-dropdown-icon u-menu u-menu-mega u-offcanvas u-menu-1 main-menu">
                                <div class="menu-collapse"
                                     style="font-size: 0.875rem; letter-spacing: 0px; font-weight: 700;">
                                    <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
                                       href="#">
                                        <svg class="u-svg-link" viewBox="0 0 24 24">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                 xlink:href="#menu-hamburger"></use>
                                        </svg>
                                        <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16"
                                             x="0px"
                                             y="0px" xmlns:xlink="http://www.w3.org/1999/xlink"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <rect y="1" width="16" height="2"></rect>
                                                <rect y="7" width="16" height="2"></rect>
                                                <rect y="13" width="16" height="2"></rect>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                                <div class="u-custom-menu u-nav-container">
                                    {menu}
                                </div>
                                <div class="u-custom-menu u-nav-container-collapse">
                                    <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                                        <div class="u-inner-container-layout u-sidenav-overflow">
                                            <div class="u-menu-close"></div>
                                            {responsive_menu}
                                        </div>
                                    </div>
                                    <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
                                </div>
                            </nav>
                            <?php
                            $megaMenuOptionsPath = get_theme_file_path('/template-parts/menu/mega-menu-primary-navigation-1.json');
                            $megaMenu = file_exists($megaMenuOptionsPath) ? file_get_contents($megaMenuOptionsPath) : '{}';
                            $menu_template = ob_get_clean();
                            echo Theme_NavMenu::getMenuHtml(array(
                                'container_class' => 'u-dropdown-icon u-menu u-menu-mega u-offcanvas u-menu-1',
                                'menu' => array(
                                    'is_mega_menu' => true,
                                    'menu_class' => 'u-nav u-unstyled u-nav-1',
                                    'item_class' => 'u-nav-item',
                                    'link_class' => 'u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base',
                                    'link_style' => 'padding: 10px 8px;',
                                    'submenu_class' => 'u-h-spacing-20 u-nav u-popupmenu-items u-unstyled u-v-spacing-10',
                                    'submenu_item_class' => 'u-nav-item',
                                    'submenu_link_class' => 'u-button-style u-nav-link u-text-custom-color-3',
                                    'submenu_link_style' => '',
                                ),
                                'responsive_menu' => array(
                                    'is_mega_menu' => false,
                                    'menu_class' => 'u-align-center u-nav u-popupmenu-items u-unstyled u-nav-7',
                                    'item_class' => 'u-nav-item',
                                    'link_class' => 'u-button-style u-nav-link',
                                    'link_style' => '',
                                    'submenu_class' => 'u-h-spacing-20 u-nav u-unstyled u-v-spacing-10',
                                    'submenu_item_class' => 'u-nav-item',
                                    'submenu_link_class' => 'u-button-style u-nav-link',
                                    'submenu_link_style' => '',
                                ),
                                'theme_location' => 'primary-navigation-1',
                                'template' => $menu_template,
                                'mega_menu' => $megaMenu,
                            )); ?>
                        </div>

                        <div class="col-xl-3 col-lg-2 col-md-6 col-10">
                            <form action="/" class="search-form" id="search_form">
                                <div class="form-group has-search">
                                    <span class="fa fa-search form-control-feedback"></span>
                                    <input type="text" class="form-control input-search" placeholder="Tra cứu" name="s">
                                    <input type="hidden" name="post_type" value="post">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="content">
        <?php if (is_single() || is_page() || is_archive()):?>
        <div class="container">
            <div class="breadcrumb-container">
                <?php
                if (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
                }
                ?>
            </div>
        </div>
        <?php endif;?>
