<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 15.03.2020
 * Time: 8:32
 * @var $this \yii\web\View
 * @var $context \module\design\section\AboutUs
 */
$context = $this->context;
?>
<section id="about-us">
    <div class="container">
        <div class="row">
            <div class="col-md-<?=$context->sliders ? 6 : 12;?>">
                <h2><?=$context->title;?></h2>
                <p><?=$context->title_description;?></p>
                <?php if ($context->sub_title):?>
                <h3 class="pading-20-0"><?=$context->sub_title;?></h3>
                <?php endif;?>
                <?=$context->content;?>
            </div>
            <?php if ($context->sliders):?>
            <div class="col-md-6"> <img src="<?=$this->context->getImageUrl(reset($context->sliders));?>" alt="image" class="img-responsive"/> </div>
            <?php endif;?>
        </div>
    </div>
</section>