<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 15.03.2020
 * Time: 8:35
 * @var $this \yii\web\View
 * @var $context \module\design\section\MainSlider
 */
$context = $this->context;
?>
<section id="main-slider" class="carousel">
    <div class="carousel slide">
        <div class="carousel-inner">
            <?php foreach ($context->contents as $index => $content):?>
            <div class="item <?=$index?'':'active';?>" style="background-image: url(<?=$this->context->getImageUrl($content['image']);?>)">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="carousel-content">
                                <div class="slider-text animation animated-item-<?=$content['animation']??1;?> <?=isset($content['position'])?'pull-'.$content['position']:'';?>">
                                    <div class="box-heading animation animated-item-1">
                                        <h3><?=$content['title'];?></h3>
                                        <span><?=number_format($content['price']).$context->sign;?></span>
                                        <?php if (isset($content['button'])):?>
                                        <a href="<?=\yii\helpers\Url::to($content['button']['url']);?>"><?=$content['button']['label'];?></a>
                                        <?php endif;?>
                                    </div>
                                    <?php foreach ($content['properties'] as $property):?>
                                    <div class="area-box text-left animation animated-item-1">
                                        <ul>
                                            <li><?=$property['icon']??'';?></li>
                                            <li>
                                                <p><?=$property['label'];?></p>
                                                <strong><?=$property['value'];?></strong><?php if(isset($property['sign'])):?><small><?=$property['sign'];?></small><?php endif;?></li>
                                        </ul>
                                    </div>
                                    <?php endforeach;?>
                                    <?php if(isset($content['url'])):?>
                                    <input class="animation animated-item-1 btn-slide" type="button" value="Детали" onclick="location.href='<?=\yii\helpers\Url::to($content['url']);?>';">
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>

            <div class="item" style="background-image:url(<?=$this->context->getImageUrl('banner-2.jpg');?>)">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="carousel-content">
                                <div class="slider-text animation animated-item-4">
                                    <div class="box-heading animation animated-item-1">
                                        <h3>Villa on Grand Avenue</h3>
                                        <span>$4,750 Monthly</span><a href="#">For Rent</a> </div>
                                    <div class="area-box text-left animation animated-item-1">
                                        <ul>
                                            <li><i class="fa fa-columns" aria-hidden="true"></i></li>
                                            <li>
                                                <p>Area </p>
                                                <strong>9350</strong><small>SQ FT</small> </li>
                                        </ul>
                                    </div>
                                    <div class="area-box text-left animation animated-item-1">
                                        <ul>
                                            <li><i class="fa fa-th-large" aria-hidden="true"></i></li>
                                            <li>
                                                <p>Bedrooms</p>
                                                <strong>4</strong></li>
                                        </ul>
                                    </div>
                                    <div class="area-box text-left animation animated-item-1">
                                        <ul>
                                            <li><i class="fa fa-trello" aria-hidden="true"></i></li>
                                            <li>
                                                <p>Bathrooms </p>
                                                <strong>4</strong></li>
                                        </ul>
                                    </div>
                                    <div class="area-box text-left animation animated-item-1">
                                        <ul>
                                            <li><i class="fa fa-car" aria-hidden="true"></i></li>
                                            <li>
                                                <p>Garages </p>
                                                <strong>2</strong></li>
                                        </ul>
                                    </div>
                                    <div class="area-box text-left animation animated-item-1">
                                        <ul>
                                            <li><i class="fa fa-home" aria-hidden="true"></i></li>
                                            <li>
                                                <p>Type </p>
                                                <strong>Villa</strong></li>
                                        </ul>
                                    </div>
                                    <input class="animation animated-item-1 btn-slide" type="submit" value="More Details">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.item-->

            <div class="item" style="background-image:url(<?=$this->context->getImageUrl('banner-3.jpg');?>)">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="carousel-content">
                                <div class="slider-text animation animated-item-4">
                                    <div class="box-heading animation animated-item-1">
                                        <h3>Home in Merrick Way</h3>
                                        <span>$540,000</span><a href="#">For Sale</a> </div>
                                    <div class="area-box text-left animation animated-item-1">
                                        <ul>
                                            <li><i class="fa fa-columns" aria-hidden="true"></i></li>
                                            <li>
                                                <p>Area </p>
                                                <strong>4300</strong><small>SQ FT</small> </li>
                                        </ul>
                                    </div>
                                    <div class="area-box text-left animation animated-item-1">
                                        <ul>
                                            <li><i class="fa fa-th-large" aria-hidden="true"></i></li>
                                            <li>
                                                <p>Bedrooms</p>
                                                <strong>3</strong></li>
                                        </ul>
                                    </div>
                                    <div class="area-box text-left animation animated-item-1">
                                        <ul>
                                            <li><i class="fa fa-trello" aria-hidden="true"></i></li>
                                            <li>
                                                <p>Bathrooms </p>
                                                <strong>3</strong></li>
                                        </ul>
                                    </div>
                                    <div class="area-box text-left animation animated-item-1">
                                        <ul>
                                            <li><i class="fa fa-car" aria-hidden="true"></i></li>
                                            <li>
                                                <p>Garages </p>
                                                <strong>2</strong></li>
                                        </ul>
                                    </div>
                                    <div class="area-box text-left animation animated-item-1">
                                        <ul>
                                            <li><i class="fa fa-home" aria-hidden="true"></i></li>
                                            <li>
                                                <p>Type </p>
                                                <strong>Single Family</strong></li>
                                        </ul>
                                    </div>
                                    <input class="animation animated-item-1 btn-slide" type="submit" value="More Details">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.item-->
        </div>
    </div>
    <!--/.carousel-->
    <a class="prev hidden-xs" href="#main-slider" data-slide="prev"> <i class="fa fa-chevron-left"></i> </a> <a class="next hidden-xs" href="#main-slider" data-slide="next"> <i class="fa fa-chevron-right"></i> </a>
</section>