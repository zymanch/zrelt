<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 15.03.2020
 * Time: 8:34
 * @var $this \yii\web\View
 * @var $context \module\design\section\Gallery
 */
$context = $this->context;
?>
<section class="full-width gallery">
    <div class="grid">
        <div class="grid-sizer"></div>
        <?php foreach ($context->getGroupedItems() as $group):?>
            <div class="grid-item<?php if ($group['type'] == \module\design\section\Gallery::TYPE_HALF):?> grid-item-half<?php endif;?>">
                <?php foreach ($group['items'] as $item):?>
                <a href="<?=\yii\helpers\Url::to($item['url']);?>"><img src="<?=$item['image'];?>" alt="">
                    <div class="overlay"></div>
                </a>
                <?php endforeach;?>
            </div>

        <?php endforeach;;?>
    </div>
</section>