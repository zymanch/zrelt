<?php
/**
 * @var Address $model
 */
$script = Yii::app()->clientScript;
$script->registerCssFile('/css/advert.css');





?>
<section id="advert">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center"> <img src="/images/head-top.png" alt="image">
                <h2 class="pading-20-0">Дом <?php echo $model->getHumanComplex(); ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 info-block">
                <?php if ($model->complex):?>
                    <div class="row">
                        <div class="col-xs-1"><i class="fa fa-table" aria-hidden="true"></i></div>
                        <div class="col-xs-10">Комплекс <?php echo $model->getHumanComplex();?></div>
                    </div>
                <?php endif;?>
                <?php if ($model->street):?>
                    <div class="row">
                        <div class="col-xs-1"><i class="fa fa-car" aria-hidden="true"></i></div>
                        <div class="col-xs-10"><?php echo implode(', ', array_filter([
                                $model->street, $model->street_house, $model->street_structure]));?></div>
                    </div>
                <?php endif;?>
                <?php if ($model->construction_year):?>
                    <div class="row">
                        <div class="col-xs-1"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></div>
                        <div class="col-xs-10">Год постройки <?php echo $model->construction_year;?></div>
                    </div>
                <?php endif;?>
                <div class="row">
                    <div class="col-xs-1"><i class="fa fa-th-list" aria-hidden="true"></i></div>
                    <div class="col-xs-10">Объявлений <?php echo count($model->adverts);?></div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12" id="map_content">
                <img src="https://static-maps.yandex.ru/1.x/?ll=<?=$model->map_y;?>,<?=$model->map_x;?>&size=450,400&z=15&l=map&pt=<?=$model->map_y;?>,<?=$model->map_x;?>,comma"/>
            </div>
        </div>
    </div>
</section>

<section id="property" style="padding-top: 0">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 >Объявления</h2>
            </div>
        </div>
        <div class="row padding-bottom-64">
            <?php $this->widget('bootstrap.widgets.TbListView',array(
                'dataProvider'=>new CArrayDataProvider($model->adverts,['pagination'=>false]),
                'template'=>'<div class="search-items">{items}<div class="clear"></div></div>',
                'itemView'=>'//advert/_view',
            )); ?>
        </div>
    </div>
</section>
