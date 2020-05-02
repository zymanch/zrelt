<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 15.03.2020
 * Time: 8:35
 * @var $this \yii\web\View
 * @var $context \module\design\section\HotOffer
 */
$context = $this->context;
?>
<section class="hot-offer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="caption">
                    <h2><?=$context->icon;?> <span><?=$context->title;?></span></h2>
                </div>
            </div>

            <div class="col-md-9 hot-offer-slider">
                <marquee><?=$context->content;?>
                </marquee>
            </div>
        </div>
    </div>
</section>