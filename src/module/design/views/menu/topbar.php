<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 02.03.2020
 * Time: 23:25
 * @var $this \yii\web\View
 * @var $context \module\design\menu\Topbar
 */
$context = $this->context;
?>
<div class="topbar">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <ul class="contactinfo">
                    <?php if ($context->phone):?>
                    <li><a href="call:<?=$context->phone;?>"><i class="fa fa-phone-square"></i> <?=$context->phone;?></a></li>
                    <?php endif;?>

                    <?php if ($context->email):?>
                    <li><a href="mailto:<?=$context->email;?>"><i class="fa fa-envelope"></i> <?=$context->email;?></a></li>
                    <?php endif;?>
                </ul>
            </div>
            <div class="col-md-5 text-right">
                <ul class="shop-menu">
                    <?php foreach ($context->menu as $item):?>
                    <li><?=\yii\helpers\Html::a($item['label'],$item['url'],$item['htmlOptions']??[]);?></li>
                    <?php endforeach;?>
                </ul>
                <?php if ($context->socials):?>
                <div class="topbar-social-icons">
                    <?php foreach ($context->socials as $social => $url):?>
                        <?=\yii\helpers\Html::a('<i class="fa fa-'.$social.'" aria-hidden="true"></i>',$url);?>
                    <?php endforeach;?>
                    </a>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
