<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 15.03.2020
 * Time: 8:38
 * @var $this \yii\web\View
 * @var $context \module\design\section\ZIndex
 */
$context = $this->context;
?>
<section class="section section-zindex">
    <div class="banner-sale-off">
        <div class="banner-sale-off-background">
            <div class="background-gray"></div>
            <div class="background-glass"><img src="<?=$this->context->getImageUrl('background-glass.png');?>" alt="" class="img-responsive"/></div>
            <div data-wow-delay="0.25s" data-wow-duration="0.8s" class="background-house wow fadeInUp"><img src="<?=$this->context->getImageUrl('background-house-1.png');?>" alt="" class="img-responsive"/></div>
        </div>
        <div class="container">
            <div data-parallax="{"y":"20%"}" class="banner-sale-off-wrapper">
            <div class="name-house"><h2 class="title">Rome & Lazio House</h2>

                <p class="description">Modern, innovation, beautiful</p></div>
            <div class="price-house">
                <div class="price-for-house">
                    <div class="price"><sup>$</sup><span class="amount">369</span><span class="small amount">,999</span></div>
                    <div class="sub-price">Per month</div>
                </div>
                <a href="property-detail.html" class="btn btn-transparent white">detail</a></div>
        </div>
    </div>
</section>
