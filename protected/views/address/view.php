<?php
/**
 * @var Address $model
 */
$script = Yii::app()->clientScript;
$script->registerCssFile('/css/advert.css');
$script->registerScriptFile('http://www.google.com/jsapi', CClientScript::POS_HEAD);
$script->registerScript(
       'google_map_init',
           '
           google.load("maps","3",{"other_params":"sensor=false"});
           var markers = [];
           var map;',
           CClientScript::POS_HEAD
);

$mapX = $model->map_x ? $model->map_x : '55.7228988';
$mapY = $model->map_y ? $model->map_y : '52.3955371';
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
';
$items = array();
$floorMax = 0;
foreach ($model->adverts as $advert) {
    $content = array(
        '<b>Площадь:</b> '. $advert->space_total.
        ($advert->space_living ? '/'.$advert->space_living : '').
        ($advert->space_cookroom ? '/'.$advert->space_cookroom : ''),
        '<b>этаж</b> '.$advert->floor,
        '<b>цена</b> '.$advert->getHumanPrice()
    );
    if (!isset($items)) {
        $items[] = array();
    }
    if (!$floorMax) {
        $floorMax = $advert->floor_max;
    }
    $items[] = CHtml::link(
        implode(', ', $content),
        array('advert/view','id' => $advert->id),
        array('target'=>'_blank')
    );
}
$address = 'Комплекс '. $model->complex.
    ($model->complex_house ? '/'.$model->complex_house : '').
    ($model->complex_structure ? '/'.$model->complex_structure : '').
    ', этажей '.$floorMax;
$jsCode.='
var marker = new google.maps.Marker({
    map:      map,
    position: new google.maps.LatLng(' . (float)$model->map_x . ',' . (float)$model->map_y .')
});
var win = new google.maps.InfoWindow();
win.setContent("' . str_replace("\n", ' ', addslashes('<b>'.$address.'</b><br>'.implode('<br>', $items))) . '");
marker.win = win;
google.maps.event.addListener(marker, "click", (function(marker, win) {
    return function() {
        win.open(map, marker);
    }
})(marker, win));
markers.push(marker);
';
$jsCode.='';
$script->registerScript(
       'google_map_show',
           $jsCode,
           CClientScript::POS_READY
);
?>
?>
<div class="info padding">
    <h1>
        Комплекс <?php echo $model->getHumanComplex(); ?>
    </h1>

    <div class="map-items">
        <?php $this->widget('bootstrap.widgets.TbListView',array(
            'dataProvider'=>new CArrayDataProvider($model->adverts),
            'template'=>'{summary}{sorter}<div class="search-items">{items}<div class="clear"></div></div>{pager}',
            'itemView'=>'//advert/_view',
            'ajaxUpdate' => false,
            'pager' => array('class'=>'bootstrap.widgets.TbPager','maxButtonCount' => 7)
        )); ?>
    </div>
    <div class="map" id="map_content">

    </div>
    <div class="clear"></div>
</div>
