<?php //theme_load_template('Blog Template', 'blogTemplate'); ?>

<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

$description = get_the_archive_description();
?>

<div class="container">
    <div class="row">
        <div class="col-lg-9 col-12 left-col">

            <section class="article-list">
                <div class="container">
                    <div class="intro">
                        <?php if (is_search()) : ?>
                            <header class="page-header">
                                <h3 class="text-center title-page"><?php printf(__('kết quả "%s"', 'annammep'), '<span>' . esc_html(get_search_query()) . '</span>'); ?></h3>
                            </header>
                        <?php endif; ?>
                        <?php if ($description) : ?>
                            <p class="text-center archive-description"><?php echo wp_kses_post(wpautop($description)); ?></p>
                        <?php endif; ?>

                    </div>
                    <?php if (have_posts()) : ?>
                        <div class="row articles archive">
                            <?php while (have_posts()) : ?>
                                <?php the_post(); ?>

                                <div class="col-sm-6 col-md-4 col-xxl-4 offset-xxl-0 item">
                                    <a href="<?= get_permalink(get_the_ID()) ?>">
                                        <img class="img-fluid crop-image-200"
                                             src="<?= get_the_post_thumbnail_url(get_the_ID()) ?>"
                                             onerror="if (this.src != 'error.jpg') this.src = '/wp-content/themes/duhocuoe/images/Flag_of_None.png';"/>
                                    </a>
                                    <h3 class="name text-overflow-3-line"><?= get_the_title() ?></h3>
                                    <p class="description text-overflow-4-line archive-description"><?= get_the_excerpt() ?></p>
                                    <a class="btn btn-read-more bg-blue btn-center" type="button"
                                       href="<?= get_permalink(get_the_ID()) ?>"
                                       style="padding-right: 30px;padding-left: 30px;margin-top: 20px;">Xem thêm
                                    </a>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php else: ?>
                        <p>Không có bài viết phù hợp</p>
                    <?php endif; ?>
                    <!--                        --><?php //twenty_twenty_one_the_posts_navigation(); ?>
                </div>
            </section>

        </div>
        <div class="col-lg-3 col-12 sidebar-post">
            <?php echo get_template_part( 'template-parts/sidebar/sidebar-schools-majors');?>
            <?php echo get_template_part('template-parts/sidebar/sidebar-post-list'); ?>
            <?php echo get_template_part( 'template-parts/sidebar/sidebar-post-popular' );?>
        </div>
    </div>
</div>

<?php get_footer(); ?>



