<?php $members = getMembersListingArray();

if (count($members) == 0) {
    return 0;
}
?>
<section class="member-sharing" id="member-sharing">
    <div class="container">
        <h3 class="section-title">CHIA SẺ HỌC VIÊN</h3>

        <div class="swiper swiper-members">
            <div class="swiper-wrapper">
                <?php foreach ($members as $member): ?>
                    <div class="swiper-slide">
                        <div class="member-item">
                            <img src="<?= $member['photo'] ?>" alt="<?= $member['name'] ?>" class="member-avt">
                            <p class="content-member"><?= $member['content'] ?></p>
                            <div class="member-footer"><h4 class="member-name"><?= $member['name'] ?></h4></div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            <div class="swiper-button-next posts-member-button-next"></div>
            <div class="swiper-button-prev posts-member-button-prev"></div>
        </div>

    </div>
</section>
