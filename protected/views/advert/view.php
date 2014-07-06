<?php
/**
 * @var Advert $model
 */
$script = Yii::app()->clientScript;
$script->registerScriptFile('http://www.google.com/jsapi', CClientScript::POS_HEAD);
$script->registerScript(
       'google_map_init',
           '
           google.load("maps","3",{"other_params":"sensor=false"});
           var markers = [];
           var map;',
           CClientScript::POS_HEAD
);
$address = $model->address;

$mapX = $address->map_x ? $address->map_x : '55.7228988';
$mapY = $address->map_y ? $address->map_y : '52.3955371';
$jsCode = '
var mapOptions = {
    center:    new google.maps.LatLng('.$mapX.','.$mapY.'),
    zoom:      15,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    mapTypeControlOptions:{
        position: google.maps.ControlPosition.LEFT_BOTTOM,
        style:    google.maps.MapTypeControlStyle.DROPDOWN_MENU
    }
};
map = new google.maps.Map(document.getElementById("map_content"), mapOptions);
var marker = new google.maps.Marker({
    map:      map,
    position: new google.maps.LatLng(' . (float)$address->map_x . ',' . (float)$address->map_y .')
});';
$script->registerScript(
       'google_map_show',
           $jsCode,
           CClientScript::POS_READY
);
?>
<div class="info padding">
    <h1>
        Комплекс <?php echo CHtml::encode($model->address->complex);?>
        <?php if ($model->address->complex_house):?>
            / <?php echo CHtml::encode($model->address->complex_house);?>
        <?php endif;?>
        <?php if ($model->address->complex_structure):?>
            / <?php echo CHtml::encode($model->address->complex_structure);?>
        <?php endif;?>
        на <?php echo $model->floor;?>/<?php echo $model->floor_max;?> этаже
    </h1>

    <div class="map-items">
        <table class="detail-view table table-striped table-condensed">
            <tbody>
                <tr class="even"><th>Тип</th><td><?php echo $model->getTypeLabel();?></td></tr>
                <tr class="odd"><th>Адрес</th><td><?php echo $model->address;?></td></tr>
                <tr class="even"><th>Этаж</th><td><?php echo $model->floor;?>/<?php echo $model->floor_max;?></td></tr>
                <tr class="odd"><th>Площадь</th><td><?php echo $model->getHumanSpace();?></td></tr>
                <tr class="even"><th>Балкон</th><td><?php echo $model->getHumanBalcony();?></td></tr>
                <tr class="even"><th>Домашний телефон</th><td><?php echo $model->getHumanPhone();?></td></tr>
                <tr class="odd"><th>Железная дверь</th><td><?php echo $model->getHumanSteelDoor();?></td></tr>
                <tr class="odd"><th>Цена</th><td><?php echo $model->getHumanPrice();?></td></tr>
                <tr class="even"><th>Продавец</th><td><?php echo CHtml::encode($model->seller->name);?></td></tr>
                <tr class="even"><th>Телефон продавца</th><td><?php echo CHtml::link($model->url,$model->url,array('target' => '_blank'));?></td></tr>
        </tbody></table>
        <hr>
        <?php echo CHtml::encode($model->information);?>
    </div>
    <div class="map" id="map_content">

    </div>
    <div class="clear"></div>
</div>