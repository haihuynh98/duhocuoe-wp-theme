<?php $visas = getVisasListingArray();

if (count($visas) == 0){
    return 0;
}
?>
<section class="our-visas section-home">
    <div class="container-fluid">
        <div class="swiper-container swiper-visas">
            <div class="swiper-wrapper swiper-visas-wrapper">
				<?php

				if ( isset( $visas ) ):
					foreach ( $visas as $visa ):
						?>

                        <div class="swiper-slide visas-slide">
                            <a href="/">
                                <img src="<?php echo $visa['logo']?>"
                                     alt="<?php echo $visa['name']?$visa['name']:''?>">
                            </a>
                        </div>
					<?php endforeach;
				endif; ?>
            </div>
        </div>
    </div>
</section>
