<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 15.03.2020
 * Time: 8:34
 * @var $this \yii\web\View
 * @var $context \module\design\section\Feature
 */
$context = $this->context;
?>
<section class="feature">
    <div class="container">
        <div class="row padding-bottom-64">
            <div class="col-md-12 text-center"> <img src="<?=$this->context->getImageUrl('head-top.png');?>" alt="image">
                <h2 class="pading-20-0"><?=$context->title;?></h2>
                <p><?=$context->content;?></p>
            </div>
        </div>
        <div class="row">
            <?php $size = 8; $itemSize = $context->items ? floor($size/count($context->items)) : $size; ;?>
            <?php foreach ($context->items as $index => $item):?>
            <?php $currentSize = $index == count($context->items)-1 ? $size-(count($context->items)-1)*$itemSize : $itemSize;?>
            <div class="col-lg-<?=$currentSize;?> page-box--service wow fadeInUp" data-wow-duration="500ms" data-wow-delay="500ms">
                <div class="portfolio-wrapper feature-work-wrap"> <img src="<?=$this->context->getImageUrl($item['image']);?>" alt="" />
                    <div class="feature-work-overlay">
                        <div class="feature-work-inner"> <span> <a title="" href="<?=\yii\helpers\Url::to($item['url']);?>"><i class="fa fa-link"></i></a> </span> </div>
                    </div>
                </div>
                <div class="page-box__content">
                    <div class="image-heading">
                        <h3 class="page-box__title"><a href="<?=\yii\helpers\Url::to($item['url']);?>"><?=$item['title'];?></a></h3>
                        <a href="#"> Цена</a> <span class="pull-right"><?=number_format($item['price']).$context->sign;?></span></div>
                    <p class="page-box__text"><?=strlen($item['content'])>230 ? substr($item['content'],0,strpos($item['content'],' ',230)).' ...': $item['content'];?></p>
                    <a class="page-box__more-link" href="<?=\yii\helpers\Url::to($item['url']);?>">Смотреть > ></a> </div>
            </div>
            <?php endforeach;?>

            <div class="col-lg-4 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="1200ms">
                <?php foreach ($context->subitems as $item):?>
                    <div class="clearfix page-box--inline"> <a href="<?=\yii\helpers\Url::to($item['url']);?>" class="page-box__picture"> <img width="100" height="70" alt="8" src="<?=$this->context->getImageUrl($item['image']);?>"> </a>
                        <div class="page-box__content">
                            <h3 class="page-box__title"><a href="<?=\yii\helpers\Url::to($item['url']);?>"><?=$item['label'];?></a></h3>
                            <p class="page-box__text"><?=strlen($item['content'])>56 ? substr($item['content'],0,strpos($item['content'],' ',56)).' ...': $item['content'];?></p>
                        </div>
                    </div>
                <?php endforeach;;?>
            </div>
            <!-- /.col -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

</section>