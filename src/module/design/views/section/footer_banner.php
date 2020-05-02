<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 15.03.2020
 * Time: 8:34
 * @var $this \yii\web\View
 * @var $context \module\design\section\FooterBanner
 */
$context = $this->context;
?>
<section class="footerBanner">
    <div class="inner">
        <div class="container">
            <div class="row">
                <img src="<?=$this->context->getImageUrl($context->image);?>" alt="footer banner" class="img-responsive fleft property">
                <div class="fleft banner_texts">
                    <h2><?=$context->title;?></h2>
                    <h3><?=$context->content;?></h3>
                </div>
                <a href="<?=\yii\helpers\Url::to($context->url);?>" class="sell_rent_link fright"><?=$context->button;?></a>
            </div>
        </div>
    </div>
</section>
