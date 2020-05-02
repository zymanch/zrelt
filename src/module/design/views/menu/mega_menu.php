<?php
/**
 * @var $this \yii\base\View
 * @var $context \module\design\menu\MegaMenu
 */
$context = $this->context;
?>
<?php if ($context->button || $context->logo || $context->sub_menu):?>
<div class="container">
    <div class="row">
        <?php if ($context->logo):?>
        <div class="col-md-5"> <img class="logo" src="<?=$context->logo;?>" alt="logo"> </div>
        <?php endif;?>
        <?php if ($context->sub_menu):?>
        <div class="col-md-5 text-right">
            <ul class="shop-menu">
                <?php foreach ($context->sub_menu as $item):?>
                    <li><?=\yii\helpers\Html::a($item['label'],$item['url'],$item['htmlOptions']??[] );?></li>
                <?php endforeach;?>
            </ul>
        </div>
        <?php endif;?>
        <?php if($context->button):?>
            <div class="col-md-2 booking text-right">
                <?=\yii\helpers\Html::a($context->button['label'],$context->button['url'],$context->button['htmlOptions']??['class'=>'button btn btn-primary btn-lg'] );?>
            </div>
        <?php endif;?>
    </div>
</div>
<?php endif;?>
<header id="navigation" class="navigation affix-top" data-offset-top="2" data-spy="affix">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="menu">
                    <ul>
                        <?php foreach($context->menu as $item):?>
                            <?php if (isset($item['items'])):?>
                                <li>
                                    <a href="#"><?=$item['label'];?></a>
                                    <ul>
                                        <?php foreach ($item['items'] as $subItem):?>
                                            <?php if (isset($subItem['items'])):?>
                                                <li>
                                                    <a href="#"><?=$subItem['label'];?></a>
                                                    <ul>
                                                        <?php foreach ($subItem['items'] as $sub2Item):?>
                                                            <li><?=\yii\helpers\Html::a($sub2Item['label'],$sub2Item['url']);?></li>
                                                        <?php endforeach;?>
                                                    </ul>
                                                </li>
                                            <?php else : ?>
                                                <li><?=\yii\helpers\Html::a($subItem['label'],$subItem['url']);?></li>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </ul>
                                </li>
                            <?php else : ?>
                                <li><?=\yii\helpers\Html::a($item['label'],$item['url']);?></li>
                            <?php endif;?>
                        <?php endforeach;;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>