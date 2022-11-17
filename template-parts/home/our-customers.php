<?php $customers = getClientsListingArray();

if (count($customers) == 0){
    return 0;
}
?>
<section class="our-customers section-home ">
    <div class="container-fluid">
        <div class="swiper-container swiper-customers">
            <div class="swiper-wrapper swiper-customers-wrapper">
				<?php

				if ( isset( $customers ) ):
					foreach ( $customers as $customer ):
						?>

                        <div class="swiper-slide customers-slide">
                            <a href="/">
                                <img src="<?php echo $customer['logo']?>"
                                     alt="<?php echo $customer['name']?$customer['name']:''?>">
                            </a>
                        </div>
					<?php endforeach;
				endif; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
