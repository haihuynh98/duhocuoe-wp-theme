<?php $productImages = get_field('product_photo'); ?>
<div class="container-product-detail">
    <div class="wrapper">
        <div class="row row-product-detail">
            <div class="col-lg-5">
                <div class="img-zoom">
                    <div class="list-image-zoom order-lg-0 order-1 ">
                        <ul class="list-img list-zoom list-unstyled mb-0" id="img_options">
                            <?php if ($productImages): foreach ($productImages as $image): ?>
                                <li>
                                    <img src="<?php echo $image['url'] ?>" alt="" class="img-product-detail">
                                </li>
                            <?php endforeach;endif; ?>
                        </ul>
                    </div>
                    <div>
                        <div id="img_zoom_container" class="img-zoom-container order-lg-1 order-0">
                            <?php if ($productImages && count($productImages) > 0): ?>
                                <img id="img_zoom" src="<?php echo $productImages[0]['url'] ?>" alt="">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="product-detail-des">
                    <div class="d-flex flex-column">
                        <div class="order-lg-0 order-1">
                            <h3 class=" title-md text-uppercase"><?php echo get_the_title() ?></h3>
                        </div>
                        <div class="order-lg-1 order-0 about-price-mobile">
                            <p class="mb-lg-3 mb-0"><b>SKU: </b><span
                                        id="product_sku"><?php echo get_field('sku') ?></span></p>
                            <hr>
                            <div id="product_price" class="d-flex flex-column">
                                <div>
                                    <span style="font-weight: bold"
                                          class="product-price order-lg-0 order-1">Giá bán:</span>
                                    <span style="font-size: 18px; font-weight: bold;">
                                        <?php

                                        $productPrice = get_field('price');

                                        if ($productPrice > 0) {
                                            echo number_format($productPrice) . ' đ';
                                        } else {
                                            echo 'Liên hệ';
                                        }

                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-3 order-lg-4">
                        <div class="container-add-to-cart">
                            <div>
                                <a href="/dat-hang/<?php echo '?pid='. get_the_ID()?>" class="btn btn-buy">
                                    <!--                                <a href="-->
                                    <?php //echo get_field('buy_link') ? get_field('buy_link') . '?link=' . get_permalink() : '#' ?><!--" class="btn btn-buy" }}>-->
                                    Đặt hàng
                                </a>
                            </div>
                        </div>
                        <hr>
                        <?php $brand = get_field('brand');
                        if ($brand):?>
                            <h3 class="mb-2 title-md text-uppercase brand-name"><?php echo $brand->post_title ?></h3>
                            <div class="order-4 order-lg-3">
                                <?php echo $brand->post_content ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>