<?php
/**
 * @var $this \yii\base\View
 * @var $context \module\design\menu\ClickMenu
 */
$context = $this->context;
?>

<header id="navigation" class="navigation">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="cd-dropdown-wrapper"> <a class="cd-dropdown-trigger" href="#0"><?=$context->title;?></a>
                    <nav class="cd-dropdown">
                        <h2></h2>
                        <a href="#0" class="cd-close">Close</a>
                        <ul class="cd-dropdown-content">
                            <?php if ($context->search):?>
                            <li>
                                <form class="cd-search" action="<?=$context->search['url'];?>">
                                    <input type="search" name="<?=$context->search['name']??'search';?>" placeholder="<?=$context->search['placeholder']??'Search...';?>">
                                </form>
                            </li>
                            <?php endif;?>
                            <?php foreach($context->menu as $item):?>
                                <?php if (isset($item['items'])):?>
                                    <li class="has-children">
                                        <a href="#"><?=$item['label'];?></a>
                                        <ul>
                                            <?php foreach ($item['items'] as $subItem):?>
                                                <?php if (isset($subItem['items'])):?>
                                                    <li class="has-children">
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
                        <!-- .cd-dropdown-content -->
                    </nav>
                    <!-- .cd-dropdown -->
                </div>
            </div>
            <div class="col-md-8 text-center">
                <?php if ($context->logo):?>
                    <div class="logo">
                        <a href="/"><img alt="Logo" src="<?=$context->logo;?>"></a>
                    </div>
                <?php endif;?>
            </div>
            <?php if ($context->footer):?>
                <div class="booking col-md-2 "> <?=\yii\helpers\Html::a($context->footer['label'],$context->footer['url'],$context->footer['htmlOptions']?:['class'=>'button btn btn-primary btn-lg'] );?></div>
            <?php endif;?>
        </div>
    </div>
</header>