<?php
$postLists = new WP_Query(array('category' => 97));
//$postLists = new WP_Query(array('cat' => 33));


if (($country = $args['country']) != 0) {
    $postLists = new WP_Query(array('category__and' =>  array( 97, $country)));
}

//$postLists = new WP_Query( array( 'category__and' => array( 2, 6 ) ) );

if ($postLists->post_count == 0 && function_exists('tg_get_all_post')) {
    $postLists = tg_get_all_post();
}
?>

<div id="sidebar-posts-list">
    <div class="sidebar widget">
        <h3>Danh sách</h3>
        <ul class="scrollbar">
            <?php if ($postLists->have_posts()) : ?>
                <?php while ($postLists->have_posts()) : $postLists->the_post(); ?>
                    <li>
                        <a href="<?= get_permalink() ?>"
                           class="animated bounceInRight text-overflow-3-line"><?= get_the_title() ?>
                        </a>
                    </li><!-- .Li ends here -->

                <?php endwhile; ?>
            <?php endif; ?>
        </ul><!-- .Ul ends here -->
    </div><!-- .Widget ends here -->
</div>