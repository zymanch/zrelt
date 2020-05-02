<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 15.03.2020
 * Time: 8:33
 * @var $this \yii\web\View
 * @var $context \module\design\section\AboutUs
 */
$context = $this->context;
?>
<section class="about-us-2">
    <div class="about-house-section padding-bottom-74">
        <div class="container">
            <div class="about-house-wrapper">
                <div class="about-house-image">
                    <?php if ($context->sliders):?>
                    <img src="<?=$this->context->getImageUrl(reset($context->sliders));?>" alt="" class="img-responsive"/>
                    <?php endif;?>
                </div>
                <div class="about-house-content"><header class="section-title">
                        <h2><?=$context->title;?></h2>
                    </header>
                    <?=$context->content;?>
            </div>
        </div>
    </div>
</section>