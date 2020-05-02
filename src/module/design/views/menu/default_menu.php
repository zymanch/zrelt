<?php
/**
 * @var $this \yii\base\View
 * @var $context \module\design\menu\DefaultMenu
 */
$context = $this->context;
?>

<header id="navigation header-container-box" class="navigation affix-top menu-line" data-offset-top="2" data-spy="affix">
    <div class="container" id="menu-nav">
        <div class="row">
            <div class="col-md-3">
                <?php if ($context->logo):?>
                <div class="logo">
                    <a href="/"><img alt="Logo" src="<?=$context->logo;?>" id="logo-header"></a>
                </div>
                <?php endif;?>
            </div><!-- /.logo -->
            <div class="col-md-<?=$context->footer?7:9;?>">
                <a class="visible-xs" href="#mobile-menu" id="mobile-menu-button"><i class="fa fa-bars"></i></a>
                <nav id="navigation">
                    <ul>
                        <?php foreach($context->menu as $item):?>
                            <?php if (isset($item['items'])):?>
                                <li class="has_submenu">
                                    <a href="#" class="hvr-overline-from-center"><?=$item['label'];?></a>
                                    <ul>
                                        <?php foreach ($item['items'] as $subItem):?>
                                            <?php if (isset($subItem['items'])):?>
                                                <li class="has_submenu">
                                                    <a href="#" class="hvr-overline-from-center"><?=$subItem['label'];?></a>
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
                </nav>
            </div>
          <?php if ($context->footer):?>
            <div class="booking col-md-2 "> <?=\yii\helpers\Html::a($context->footer['label'],$context->footer['url'],$context->footer['htmlOptions']?:['class'=>'button btn btn-primary btn-lg'] );?></div>
          <?php endif;?>
        </div>
    </div>
</header>