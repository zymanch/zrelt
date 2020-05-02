<?php
/**
 * @var Advert $model
 */

use models\Advert;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;

$address = $model->address;
?>
<section id="advert">
    <div class="container">
        <div class="row padding-bottom-64">
            <div class="col-md-12 text-center"> <img src="/images/head-top.png" alt="image">
                <h2 class="pading-20-0">Дом <?php echo Html::encode($model->address->complex);?>
                    <?php if ($model->address->complex_house):?>
                        / <?php echo Html::encode($model->address->complex_house);?>
                    <?php endif;?>
                    <?php if ($model->address->complex_structure):?>
                        / <?php echo Html::encode($model->address->complex_structure);?>
                    <?php endif;?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 info-block">
                <div class="row">
                    <div class="col-xs-1"><i class="fa fa-home" aria-hidden="true"></i></div>
                    <div class="col-xs-10"><?php echo $model->getTypeLabel();?></div>
                </div>
                <div class="row">
                    <div class="col-xs-1"><i class="fa fa-location-arrow" aria-hidden="true"></i></div>
                    <div class="col-xs-10"><?php echo $model->address;?></div>
                </div>
                <div class="row">
                    <div class="col-xs-1"><i class="fa fa-tasks" aria-hidden="true"></i></div>
                    <div class="col-xs-10"><?php echo $model->floor;?>/<?php echo $model->floor_max;?> этаж</div>
                </div>
                <div class="row">
                    <div class="col-xs-1"><i class="fa fa-columns" aria-hidden="true"></i></div>
                    <div class="col-xs-10"><?php echo $model->getHumanSpace();?>m<sup>2</sup></div>
                </div>
                <div class="row">
                    <div class="col-xs-1"><i class="fa fa-university" aria-hidden="true"></i></div>
                    <div class="col-xs-10">Балкон: <?php echo $model->getHumanBalcony();?></div>
                </div>
                <div class="row">
                    <div class="col-xs-1"><i class="fa fa-rub" aria-hidden="true"></i></div>
                    <div class="col-xs-10"><?php echo $model->getHumanPrice();?></div>
                </div>
                <div class="row">
                    <div class="col-xs-1"><i class="fa fa-phone" aria-hidden="true"></i></div>
                    <div class="col-xs-10">
                        <?php echo Html::encode($model->seller->name);?>
                        <?php echo Html::a($model->phone,'phone:'.$model->phone,array('target' => '_blank'));?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <?php echo Html::encode($model->information);?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12" id="map_content">
                <img src="https://static-maps.yandex.ru/1.x/?ll=<?=$address->map_y;?>,<?=$address->map_x;?>&size=450,400&z=15&l=map&pt=<?=$address->map_y;?>,<?=$address->map_x;?>,comma"/>
            </div>
        </div>
    </div>
</section>
<?php if (count($address->adverts) > 1):?>
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