<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 */

get_header();

$description = get_the_archive_description();

$categorys = get_the_category();
$countryID = 0;
foreach ($categorys as $category) {
    if ($category->taxonomy == 'category' && boolval(get_option("is_country_category_" . $category->term_id)) == true) {
        $countryID = $category->term_id;
    }
}

if ($countryID != 0) {
    if (($schoolIDs = get_option("schools_category_" . $countryID)) != '') {
        $choolIDsArr = explode(',', $schoolIDs);
    }
}

?>


<div class="container">
    <div class="row">
        <div class="col-lg-9 col-12 left-col">

            <section class="article-list">
                <div class="container">
                    <div class="intro">
                        <?php the_archive_title('<h3 class="text-center title-page">', '</h3>'); ?>
                        <?php if ($description) : ?>
                            <p class="text-center archive-description"><?php echo wp_kses_post(wpautop($description)); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="row articles archive">
                        <?php if (have_posts()) : $postNum = 0; ?>

                        <?php if (($trendingPost = get_term_meta(get_query_var('cat'),'trending_post',true)) != ''):?>
                                <div class="col-12">
                                    <a href="<?= get_permalink($trendingPost) ?>">
                                        <div class="top-content">
                                            <img class="img-fluid crop-image-400" loading="lazy"
                                                 src="<?= get_the_post_thumbnail_url($trendingPost, 'medium_large') ?>"
                                                 onerror="if (this.src != 'error.jpg') this.src = '/wp-content/themes/duhocuoe/images/Flag_of_None.png';"/>
                                            <div class="overlay-content">
                                                <p class="date"><?= get_the_date('d.m.Y', $trendingPost)?></p>
                                                <h2 class="title-post text-overflow-3-line"><?= get_the_title($trendingPost) ?></h2>
                                                <p class="description text-overflow-4-line archive-description"><?= get_the_excerpt($trendingPost) ?></p>
                                                <a class="btn btn-read-more bg-blue" type="button"
                                                   href="<?= get_permalink($trendingPost) ?>"
                                                   style="padding-right: 30px;padding-left: 30px;margin-top: 20px;">Xem thêm
                                                </a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                        <?php endif; ?>
                            <?php while (have_posts()) : ?>
                                <?php the_post(); ?>
                                <?php
                                $postNum++;

                                if (!empty($trendingPost) && $trendingPost != '' && $trendingPost == get_the_ID()) {
                                    continue;
                                }
                                if ($postNum == 1 && (empty($trendingPost) || $trendingPost == '')):?>
                                    <div class="col-12">
                                        <a href="<?= get_permalink(get_the_ID()) ?>">
                                            <div class="top-content">
                                            <img class="img-fluid crop-image-400" loading="lazy"
                                                 src="<?= get_the_post_thumbnail_url(get_the_ID(), 'medium_large') ?>"
                                                 onerror="if (this.src != 'error.jpg') this.src = '/wp-content/themes/duhocuoe/images/Flag_of_None.png';"/>
                                                <div class="overlay-content">
                                                    <p class="date"><?= get_the_date('d.m.Y')?></p>
                                                    <h2 class="title-post text-overflow-3-line"><?= get_the_title() ?></h2>
                                                    <p class="description text-overflow-4-line archive-description"><?= get_the_excerpt() ?></p>
                                                    <a class="btn btn-read-more bg-blue" type="button"
                                                       href="<?= get_permalink(get_the_ID()) ?>"
                                                       style="padding-right: 30px;padding-left: 30px;margin-top: 20px;">Xem thêm
                                                    </a>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php else: ?>
                                    <div class="col-sm-6 col-md-4 col-xxl-4 offset-xxl-0 item">
                                        <a href="<?= get_permalink(get_the_ID()) ?>">
                                            <img class="img-fluid crop-image-200" loading="lazy"
                                                 src="<?= get_the_post_thumbnail_url(get_the_ID(), 'medium') ?>"
                                                 onerror="if (this.src != 'error.jpg') this.src = '/wp-content/themes/duhocuoe/images/Flag_of_None.png';"/>
                                        </a>
                                        <h3 class="name text-overflow-3-line"><?= get_the_title() ?></h3>
                                        <p class="description text-overflow-4-line archive-description"><?= get_the_excerpt() ?></p>
                                        <a class="btn btn-read-more bg-blue btn-center" type="button"
                                           href="<?= get_permalink(get_the_ID()) ?>"
                                           style="padding-right: 30px;padding-left: 30px;margin-top: 20px;">Xem thêm
                                        </a>
                                    </div>
                                <?php endif ?>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <p>Không có bài viết ở danh mục này</p>
                        <?php endif; ?>
                    </div>
                    <!--                        --><?php //twenty_twenty_one_the_posts_navigation(); ?>
                </div>
            </section>

        </div>
        <div class="col-lg-3 col-12 sidebar-post">
            <?php echo get_template_part('template-parts/sidebar/sidebar-schools-majors', null, ['schools' => $schoolIDs]); ?>
            <?php echo get_template_part('template-parts/sidebar/sidebar-post-list', null, ['country' => $countryID]); ?>
            <?php echo get_template_part('template-parts/sidebar/sidebar-post-popular'); ?>
            <?php echo get_template_part('template-parts/sidebar/sidebar-banner-vertical'); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>


