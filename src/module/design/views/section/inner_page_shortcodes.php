<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 15.03.2020
 * Time: 8:35
 * @var $this \yii\web\View
 * @var $context \module\design\section\InnerPageShortcodes
 */
$context = $this->context;
?>
<section class="inner-page-shortcodes-section">
    <div class="container">
        <div id="inner-page-shortcodes-full-width" class="inner-page-shortcodes">
            <div class="row padding-bottom-64">
                <div class="col-md-12 text-center"> <img alt="image" src="<?=$this->context->getImageUrl('head-top.png');?>">
                    <h2 class="pading-20-0"><?=$context->title;?></h2>
                    <p><?=$context->description;?></p>
                </div>
            </div>
            <?=$context->content;?>
        </div>
    </div>
</section>
