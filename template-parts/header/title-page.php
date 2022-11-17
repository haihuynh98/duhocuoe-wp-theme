<?php if (has_post_thumbnail()) : ?>
    <?php
    $backgroundImage = get_the_post_thumbnail_url();
    $styleBackground = "background: #0A246A;";
    if ($backgroundImage) {
        $styleBackground = "background-image:url('" . $backgroundImage . "');";
    }
    ?>
    <section class="breadcrumb-area"  style="<?php echo $styleBackground ?>">
        <div class="container">
            <div class="title-page breadcrumb-page">
                <h2 class="title"><?php echo get_the_title(); ?></h2>
                <?php dimox_breadcrumbs(); ?>
            </div>
        </div>
    </section>
<?php else: ?>
    <div class="title-page empty-post-thumbnail">
    </div>
<?php endif; ?>