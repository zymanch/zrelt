<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 02.03.2020
 * Time: 23:25
 * @var $this \yii\web\View
 * @var $context \module\design\menu\Logo
 */
$context = $this->context;
?>
<div class="container">
    <div class="row">
        <div class="col-md-5"> <img class="logo" src="<?=$context->logo;?>" alt="logo"> </div>
        <div class="col-md-<?=$context->footer?5:7;?> text-right">
            <ul class="shop-menu">
                <?php foreach ($context->menu as $item):?>
                    <li><?=\yii\helpers\Html::a($item['label'],$item['url'],$item['htmlOptions']??[]);?></li>
                <?php endforeach;?>
            </ul>
        </div>
        <?php if ($context->footer):?>
            <div class="booking col-md-2 text-right"> <?=\yii\helpers\Html::a($context->footer['label'],$context->footer['url'],$context->footer['htmlOptions']?:['class'=>'button btn btn-primary btn-lg'] );?></div>
        <?php endif;?>
    </div>
</div>
