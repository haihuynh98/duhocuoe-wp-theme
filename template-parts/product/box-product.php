<?php
$ProductID = $post->ID;
$imagesSrc = get_the_post_thumbnail_url($ProductID, 'medium');
$link = esc_url(get_permalink());
$titleProduct = $post->post_title;
//$price = get_field('price', $ProductID)==0?'Liên hệ': number_format(get_field('price', $ProductID)).' VND';
$price = 'Lien he';
?>
<div class="box-product">
    <a href="<?php echo $link ?>"><img src="<?php echo $imagesSrc ?>" alt="<?php echo $titleProduct ?>"
                                       class="image" data-mh="productimg"></a>
    <h1 class="product-name" data-mh="productname"><a href="<?php echo $link ?>"><?php echo $titleProduct ?></a></h1>
    <p class="product-description" data-mh="productdescription"><?php echo get_the_excerpt($ProductID) ?></p>
    <div class="bottom-item">
        <a href="<?php echo $link ?>" class="btn-contact"><span>Liên hệ</span></a>
    </div>
<!--    <div class="bottom-item-product">-->
<!--        <a href="--><?php //echo $link ?><!--" class="btn-buy"><span>Liên hệ</span></a>-->
<!--    </div>-->
</div>