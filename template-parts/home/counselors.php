<?php $counselors = getCounselorsListingArray() ;

if (count($counselors) == 0){
    return 0;
}
?>
<section class="consultants" id="consultants">
    <div class="container">
        <h3 class="section-title">CHUYÊN VIÊN TƯ VẤN</h3>
        <div class="row">
            <?php
            if (isset($counselors)):
                foreach ($counselors as $counselor):?>
                    <div class="col-md-3 col-6 member-item">
                        <img src="<?= $counselor['photo'] ?>"
                             alt="<?= $counselor['name'] ?>"
                             class="member-avt">
                        <h4 class="member-name"><?= $counselor['name'] ?></h4>
                        <p><?= $counselor['position'] ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
</section>
