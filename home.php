<?php

get_header();
?>

    <section id="slider" class="slider">
        <!-- Swiper -->
        <?php $carousels = getCarouselsListingArray(); ?>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php foreach ($carousels as $carousel): ?>
                    <div class="swiper-slide">
                        <img src="<?= $carousel['image'] ?>" srcset="<?php echo $carousel['image_large'] . ' 800w, ' . $carousel['image'] . ' 1000w' ?>" alt="<?= $carousel['name'] ?>">
                    </div>
                <?php endforeach; ?>
                <div class="swiper-slide">
                    <img src="/wp-content/themes/duhocuoe/images/banner-2.webp" alt="banner 2">
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <div class="overlay-banner">
            <div class="container">
                <div class="form-filter">
                    <?php
                    $majors = [
                        'Y Học',
                        'Nông Nghiệp',
                        'Lịch Sử',
                        'Quản lý',
                        'Kinh doanh',
                        'Thiết kế đồ họa',
                        'Công nghệ thông tin',
                        "Khoa học máy tính"
                    ];
                    $countrys = [
                        'canada',
                        'new zealand',
                        'úc',
                        'thụy sỹ',
                        'tây ban nha',
                        'hà lan',
                        'philippines',
                        'malaysia',
                        'malta',
                        'singapore',
                        'trung quốc',
                        'đài loan',
                        'nhật bản',
                        'thái lan',
                        'hàn quốc',
                        'mỹ'
                    ];


                    $certificates = [
                        'trung học',
                        'ngôn ngữ',
                        'cao học',
                        'đại học',
                        'cao đẳng',
                    ];
                    ?>

                    <form action="/" id="filter-major">
                        <input type="text" id="input_search" name="s" style="display:none;">
                        <input type="hidden" name="post_type" value="post">
                        <select id="majors">
                            <option value="">Ngành học</option>
                            <?php foreach ($majors as $major): ?>
                                <option value="<?= $major ?>"><?= $major ?></option>
                            <?php endforeach; ?>
                        </select>
                        <select id="country">
                            <option value="">Điểm đến</option>
                            <?php foreach ($countrys as $country): ?>
                                <option value="<?= $country ?>"><?= $country ?></option>
                            <?php endforeach; ?>
                        </select>
                        <select id="certificate">
                            <option value="">Bằng cấp</option>
                            <?php foreach ($certificates as $certificate): ?>
                                <option value="<?= $certificate ?>"><?= $certificate ?></option>
                            <?php endforeach; ?>
                        </select>
                        <input type="submit" class="submit btn" id="submit" value="Tra cứu" disabled>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="about"
             style="background-image: url('/wp-content/themes/duhocuoe/images/banner-section-1.png')">
        <div class="container">
            <h4 class="text-white">CHÀO MỪNG ĐẾN VỚI LIÊN HIỆP GIÁO DỤC ĐẠI DƯƠNG</h4>
            <h2>CÔNG TY LIÊN HIỆP GIÁO DỤC ĐẠI DƯƠNG - UOE</h2>
            <p class="text-white">Công ty Liên Hiệp Giáo Dục Đại Dương – Du học UOE được thành lập vào năm 2013 bởi
                những tư vấn viên từng sinh sống và làm việc tại các quốc gia như Nhật Bản, Đài Loan, Mỹ.</p>
            <p class="text-white">Với slogan “Nơi gửi gắm ước mơ du học”, du học UOE đã và đang là cầu nối cho các bạn
                học sinh, sinh viên Việt Nam có hoài bão học tập, nghiên cứu, sinh sống ở nước ngoài, tìm những chân
                trời mới để mở mang kiến thức, nâng cao giá trị bản thân, sẵn sàng cho một kỷ nguyên hội nhập đa quốc
                gia. </p>
            <a href="/ve-uoe" class="btn btn-read-more">Xem thêm</a>
            <img src="/wp-content/themes/duhocuoe/images/Untitled-1-07.png"
                 alt="CÔNG TY LIÊN HỆ  GIÁO DỤC ĐẠI DƯƠNG - UOE" class="image-about">
        </div>
    </section>


<?php $postScholarship = get_posts(['category' => 16]);
if (count($postScholarship) == 0 && function_exists('tg_get_all_post')) {
    $postScholarship = tg_get_all_post();
}
?>
    <section id="posts-scholarship" class="posts-scholarship">
        <div class="container">
            <h3 class="section-title">TIN TỨC HỌC BỔNG</h3>
            <!-- Swiper -->
            <div class="swiper swiper-posts-scholarship">
                <div class="swiper-wrapper">
                    <?php foreach ($postScholarship as $scholarship): ?>
                        <div class="swiper-slide">
                            <a href="<?= get_permalink($scholarship->ID) ?>">
                                <div class="post-container post-container-scholarship">
                                    <img class="crop-image-200"
                                         src="<?= get_the_post_thumbnail_url($scholarship->ID, 'medium') ?>"
                                         alt="<?= $scholarship->post_title; ?>"
                                         onerror="if (this.src != 'error.jpg') this.src = '/wp-content/themes/duhocuoe/images/Flag_of_None.png';">
                                    <h3 class="post-title text-overflow-3-line"><?= $scholarship->post_title; ?></h3>
                                    <p class="description text-overflow-5-line"><?= $scholarship->post_excerpt ?></p>
                                    <p class="public-at"><?= get_the_date('j F, Y', $scholarship->ID) ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>

                </div>
                <div class="posts-scholarship-button-next"></div>
                <div class="posts-scholarship-button-prev"></div>
                <div class="posts-scholarship-pagination"></div>
            </div>
        </div>
    </section>


<?php if (function_exists('tg_get_posts_popular')):
    $queryPopular = tg_get_posts_popular('post', 'ASC'); ?>
    <section id="posts-popular" class="posts-popular">
        <div class="container">
            <h3 class="section-title">TIN TỨC NỔI BẬT</h3>
            <!-- Swiper -->
            <div class="swiper swiper-posts-popular">
                <div class="swiper-wrapper">
                    <?php foreach ($queryPopular as $popularPost) : ?>
                        <div class="swiper-slide">
                            <div class="post-container">
                                <a href="<?= get_permalink($popularPost->ID) ?>">
                                    <h3 class="post-title"><?= $popularPost->post_title ?></h3>
                                </a>
                                <p class="post-date text-center"> <?= get_the_date('j F, Y', $popularPost->ID) ?></p>
                                <a href="<?= get_permalink($popularPost->ID) ?>">
                                    <img class="crop-image-400 h-mobile-50"
                                         src="<?= get_the_post_thumbnail_url($popularPost->ID, 'medium_large') ?>"
                                         alt="<?= $popularPost->post_title ?>"
                                         onerror="if (this.src != 'error.jpg') this.src = '/wp-content/themes/duhocuoe/images/Flag_of_None.png';">
                                </a>
                                <p class="description text-overflow-4-line"><?= $popularPost->post_excerpt ?></p>
                                <a href="<?= get_permalink($popularPost->ID) ?>"
                                   class="btn btn-read-more bg-blue btn-center">Xem Thêm</a>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
                <div class="posts-popular-pagination"></div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php $postEvent = get_posts(['category' => $eventID = 17]);
if (count($postEvent) == 0 && function_exists('tg_get_all_post')) {
    $postEvent = tg_get_all_post();
}
?>
    <section class="post-event" id="post-event">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-12 col-left">
                    <h3 class="section-title">SỰ KIỆN HỘI THẢO</h3>
                    <?php echo category_description($eventID); ?>
                    <a href="<?= get_category_link($eventID) ?>" class="btn btn-read-more btn-outline-blue">Xem
                        thêm sự kiện</a>
                </div>
                <div class="col-lg-8 col-12 p-4">
                    <div class="swiper swiper-event">
                        <div class="swiper-wrapper">
                            <?php foreach ($postEvent as $event): ?>
                                <div class="swiper-slide">
                                    <a href="<?= get_the_permalink($event->ID) ?>">
                                        <div class="post-container post-container-event">
                                            <img class="crop-image-200"
                                                 src="<?= get_the_post_thumbnail_url($event->ID, 'medium') ?>"
                                                 onerror="if (this.src != 'error.jpg') this.src = '/wp-content/themes/duhocuoe/images/Flag_of_None.png';"
                                                 alt="<?= $event->post_title ?>">
                                            <h3 class="post-title text-overflow-3-line"><?= $event->post_title ?></h3>
                                            <p class="description text-overflow-3-line"><?= $event->post_excerpt ?></p>
                                            <p class="public-at"> <?= get_the_date('j F, Y', $event->ID) ?></p>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>

                        </div>
                        <div class="swiper-button-next posts-event-button-next"></div>
                        <div class="swiper-button-prev posts-event-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?= get_template_part('template-parts/home/members'); ?>
<?//= get_template_part('template-parts/home/counselors'); ?>
<?= get_template_part('template-parts/home/visa'); ?>
<?= get_template_part('template-parts/home/our', 'customers'); ?>

<?php
get_footer();
