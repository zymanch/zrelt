
<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 15.03.2020
 * Time: 8:33
 * @var $this \yii\web\View
 * @var $context \module\design\section\BgBanner
 */
$context = $this->context;
?>
<section id="bg-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="banner-heading"> <img alt="image" src="<?=$this->context->getImageUrl('head-top-2.png');?>">
                    <h1><?=$context->title;?></h1>
                    <p><?=$context->content;?></p>
                    <p>
                        <?php foreach($context->links as $index => $menu):?>
                        <?php if ($index):?><span>/</span><?php endif;?>
                        <?=\yii\helpers\Html::a($menu['label'],$menu['url'],$menu['htmlOptions']??[]);?>
                        <?php endforeach;;?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

