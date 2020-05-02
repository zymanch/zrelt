<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 15.03.2020
 * Time: 8:33
 * @var $this \yii\web\View
 * @var $context \module\design\section\CarouselFullWidth
 */
$context = $this->context;
$context->registerJsFile('owl.carousel.min.js');
$id = 'gallery'.rand(0,time());
$options = [
    'autoPlay' => true,
    'items' => count($context->items),
    //'responsive' => [0=>['items'=>1],600=>['items'=>2],1024=>['items'=>3]]
];
$this->registerJs('$("#'.$id.'").owlCarousel('.json_encode($options).');	',\yii\web\View::POS_READY);
?>
<Section class="wide-3 carousel-full-width">
    <div class="container">
        <div class="row padding-bottom-64">
            <div class="col-md-12 text-center"> <img src="<?=$this->context->getImageUrl('head-top.png');?>" alt="image">
                <h2 class="pading-20-0"><?=$context->title;?></h2>
                <p><?=$context->content;?></p>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div id="<?=$id;?>" class="owl-carousel owl-theme ">
            <?php foreach ($context->items as $item):?>
            <div class="item">
                <div class="image" style="background:url(<?=$this->context->getImageUrl($item['image']);?>)"></div>
                <div class="img-info">
                    <div class="row">
                        <div class="half col-xs-7">
                            <h3><?=\yii\helpers\Html::a($item['title'],$item['url'],$item['htmlOptions']??[]);?></h3>
                            <h6><?=$item['sub_title'];?></h6>
                        </div>
                        <div class="half col-xs-5 info-right">
                            <p>asd</p>
                        </div>
                        <hr>
                    </div>
                    <p class="white"><?=$item['content'];?></p>
                </div>
            </div>
            <?php endforeach;;?>
        </div>
        <?php if ($context->button):?>
        <span class="ffs-bs padding-top-74">
        <input type="button" class="btn-slide" onclick="location.href='<?=\yii\helpers\Url::to($context->button['url']);?>';return false;" value="<?=$context->button['label'];?>">
        </span>
        <?php endif;?>
    </div>
</Section>

