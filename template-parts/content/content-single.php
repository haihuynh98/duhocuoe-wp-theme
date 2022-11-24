<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

$categorys = get_the_category();
$countryID = 0;
foreach ($categorys as $category) {
    if ($category->taxonomy == 'category' && boolval(get_option("is_country_category_" . $category->term_id)) == true) {
        $countryID = $category->term_id;
    }
}

if ($countryID != 0) {
    if ( ($schoolIDs = get_option("schools_category_" . $countryID)) != '') {
        $choolIDsArr = explode(',', $schoolIDs);
    }
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-12 content-container">
                <header class="text-center">
                    <?php the_title('<h3 class="title-page">', '</h3>'); ?>
                </header>

                <div class="content">
                    <?php
                    the_content();

                    wp_link_pages(
                        array(
                            'before' => '<nav class="page-links" aria-label="' . esc_attr__('Page', 'twentytwentyone') . '">',
                            'after' => '</nav>',
                            /* translators: %: Page number. */
                            'pagelink' => esc_html__('Page %', 'twentytwentyone'),
                        )
                    );

                    ?>

                    <section class="tags-single">
                        <div class="title-container sub-title down-line">
                            <div class="title-section">
                                <h2>Từ khóa</h2>
                            </div>
                        </div>
                        <div class="list-tag">
                            <ul>
                                <?php
                                $tags = get_tags();
                                if ($tags):
                                    $tagListNum = 1;
                                    foreach ($tags as $tag) :
                                        if ($tagListNum > 10) {
                                            break;
                                        }

                                        $tag_link = get_tag_link($tag->term_id);
                                        $tag_name = $tag->name;

                                        echo "<li><a href='" . $tag_link . "'>" . $tag_name . "</a></li>";
                                        $tagListNum++;
                                    endforeach;
                                endif;?>
                            </ul>
                        </div>
                    </section>

                </div><!-- .entry-content -->


            </div>
            <div class="col-lg-3 col-12 sidebar-post">
                <?php echo get_template_part('template-parts/sidebar/sidebar-post-popular'); ?>
                <?php echo get_template_part('template-parts/sidebar/sidebar-post-list', null, ['country' => $countryID]); ?>
                <?php echo get_template_part('template-parts/sidebar/sidebar-schools-majors',null, ['schools'=>$schoolIDs]); ?>
                <?php echo get_template_part('template-parts/sidebar/sidebar-banner-vertical'); ?>
            </div>
        </div>
        <?php example_cats_related_post() ?>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->
