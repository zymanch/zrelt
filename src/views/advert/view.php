<?php
/**
 * @var Advert $model
 */

use models\Advert;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;

$address = $model->address;
?>

<section class="submit-property" style="background-image: url('<?=$model->getBgImage();?>');">
    <div class="container" style="background-color: rgba(0,0,0,0.6);padding:40px;">
        <div class="row padding-bottom-64">
            <div class="col-md-12 text-center"> <img src="/images/head-top-2.png" alt="image">
                <h2 class="pading-20-0 white"><?php echo $model->getTypeLabel();?></h2>
            </div>
        </div>
        <div class="row padding-bottom-64" >
            <div class="about-services padding-0">
                <div class="col-md-4 col-sm-4 col-xs-12 servicesone padding-left-0">
                    <div class="float-left col-md-9 col-sm-9 col-xs-12 padding-0">
                        <h3 class="blue">Дом</h3>
                        <p class="white">
                            <br/>
                            <br/>
                            <?php echo $model->address;?>
                        </p>
                        <p class="white">
                            <?php echo $model->floor;?>/<?php echo $model->floor_max;?> этаж
                        </p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 servicesone padding-left-0">
                    <div class="float-left col-md-9 col-sm-9 col-xs-12 padding-0">
                        <h3 class="blue">Квартира</h3>
                        <p class="white">
                            <br/>
                            <br/>
                            <?php echo $model->getHumanSpace();?>m<sup>2</sup>
                        </p>
                        <p class="white">
                            Балкон: <?php echo $model->getHumanBalcony();?>
                        </p>
                        <p class="white">
                            <?php echo $model->getHumanPrice();?>
                        </p>
                        <p class="white">
                            <?php echo $model->get1MeterPrice();?>
                        </p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 servicesone padding-left-0">
                    <div class="float-left col-md-9 col-sm-9 col-xs-12 padding-0">
                        <h3 class="blue">Контакты</h3>
                        <p class="white">
                            <br/>
                            <br/>
                            <?=Html::encode($model->seller->name);?>
                        </p>
                        <?php if ($model->seller->site):?>
                            <p class="white"><?=Html::a($model->seller->site,$model->seller->site);?></p>
                        <?php endif;?>
                        <p class="white">
                            <?php foreach ($model->seller->sellerPhones as $phone):?>
                                <?=Html::a($phone, 'tel:'.$phone);?><br>
                            <?php endforeach;?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($model->information):?>
        <div class="row padding-bottom-64">
            <div class="col-md-12 text-center">
                <hr>
                <p class="white"><?php echo $model->information;?></p>
            </div>
        </div>
        <?php endif;?>
        <?php if ($model->hasPanorama()):?>
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="query-submit-button">
                    <a class="btn-slide" href="<?=\yii\helpers\Url::to(['panorama/view','id'=>$model->id]);?>">Смотреть квартиру</a>
                </div>
            </div>
        </div>
        <?php endif;?>
    </div>
</section>


<section id="advert">
    <div class="container">
        <div class="col-xs-12">
            <div class="row">
                <?php echo \module\design\section\Gallery::widget([
                    'items' => array_merge(
                        [[
                            'image'=>'https://static-maps.yandex.ru/1.x/?ll='.$address->map_y.','.$address->map_x.'&size='.\models\Image::PREVIEW_WIDTH.','.\models\Image::PREVIEW_HEIGHT.'&z=15&l=map&pt='.$address->map_y.','.$address->map_x.',comma',
                            'width' => \models\Image::PREVIEW_WIDTH,
                            'height' => \models\Image::PREVIEW_HEIGHT,
                            'url' =>'https://static-maps.yandex.ru/1.x/?ll='.$address->map_y.','.$address->map_x.'&size='.\models\Image::FULL_WIDTH.','.\models\Image::FULL_HEIGHT.'&z=15&l=map&pt='.$address->map_y.','.$address->map_x.',comma',
                        ]],
                        array_filter(array_map(function(\models\Image $image) {
                            if ($image->type !== \models\Image::TYPE_IMAGE) {
                                return null;
                            }
                            return [
                                'image'=>$image->getPreviewUrl(),
                                'width' => \models\Image::PREVIEW_WIDTH,
                                'height' => \models\Image::PREVIEW_HEIGHT,
                                'url' =>$image->getFullImageUrl()
                            ];
                        }, $model->images))
                    )
                ]);?>
            </div>
        </div>
    </div>
</section>
<?php if (count($address->adverts) > 1):?>
<hr>
    <section id="property" style="padding-top: 0">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="pading-20-0">Другие объявления в этом доме</h2>
                </div>
            </div>
            <div class="row padding-bottom-64">
                <?php
                $adverts = $address->adverts;
                foreach ($adverts as $index => $advert) {
                    if ($advert->id === $model->id) {
                        unset($adverts[$index]);
                    }
                }
                echo \yii\widgets\ListView::widget([
                    'dataProvider'=>new ArrayDataProvider(['allModels'=>$adverts,'pagination'=>['pageSize'=>false]]),
                    'layout'=>'<div class="search-items">{items}<div class="clear"></div></div>',
                    'itemView'=>'//advert/_view',
                ]);
                ?>
            </div>
        </div>
    </section>

<?php endif;?>
