<?php
/**
 * @var Advert $model
 * @var \yii\web\View $this
 */

use models\Advert;
?>
<div class="col-md-4 col-sm-4 col-xs-12">
    <div class="single-effect">
        <div class="wpf-property">
            <?=\yii\helpers\Html::a('<img src="https://static-maps.yandex.ru/1.x/?ll='.$model->address->map_y.','.$model->address->map_x.'&size='.\models\Image::THUMB_WIDTH.','.\models\Image::THUMB_HEIGHT.'&z=15&l=map&pt='.$model->address->map_y.','.$model->address->map_x.',comma" alt="image" class="img-responsive">',['advert/view','id' => $model->id]);?>

            <div class="view-caption">
                <div class="property-box">
                    <div class="box-heading">
                        <h3><?php echo $model->getTypeLabel(); ?></h3>
                        <span><?php echo $model->getHumanPrice(); ?></span>
                    </div>
                    <div class="area-box text-left">
                        <ul>
                            <li><i class="fa fa-tasks" aria-hidden="true"></i></li>
                            <li>
                                <p>Этаж</p>
                            <strong><?php echo $model->floor;?>/<?php echo $model->floor_max;?></strong>
                            </li>
                        </ul>
                    </div>
                    <div class="area-box text-left">
                        <ul>
                            <li><i class="fa fa-columns" aria-hidden="true"></i></li>
                            <li>
                                <p>Площадь </p>
                                <strong><?=$model->getHumanSpace();?></strong><small>м<sub>2</sub></small> </li>
                        </ul>
                    </div>
                    <div class="area-box text-left">
                        <ul>
                            <li><i class="fa fa-rub" aria-hidden="true"></i></li>
                            <li>
                                <p>Цена за м<sup>2</sup> </p>
                                <strong><?=$model->get1MeterPrice();?></strong> </li>
                        </ul>
                    </div>
                    <?php if ($model->canEdit()):?>
                        <?=\yii\helpers\Html::a(\module\design\Icon::EYE,['advert/view','id' => $model->id],['class'=>'animation animated-item-1 btn-slide']);?>
                        <?=\yii\helpers\Html::a(\module\design\Icon::EDIT,['advert/update','id' => $model->id],['class'=>'animation animated-item-1 btn-slide']);?>
                    <?php else:?>
                        <?=\yii\helpers\Html::a('Посмотреть',['advert/view','id' => $model->id],['class'=>'animation animated-item-1 btn-slide']);?>
                    <?php endif;?>
                </div>
            </div>
            <div class="image-heading">
                <h3><?php echo $model->getTypeLabel(); ?></h3>
                 <span class="pull-right"><?php echo $model->getHumanPrice(); ?></span></div>
        </div>
    </div>
</div>