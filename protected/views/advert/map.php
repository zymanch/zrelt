<?php
/**
 * @var SearchAdvert $model
 * @var Advert $advert
 */
Yii::app()->clientScript->registerCssFile('/css/advert.css');
$provider = $model->search(10);
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
$adverts = $provider->getData();
$mapX = '55.7228988';
$mapY = '52.3955371';
$avgMapX = 0;
$avgmapY = 0;
$count = 0;
foreach ($adverts as $advert) {
    if ($advert->address->map_x && $advert->address->map_y) {
        $avgMapX+=$advert->address->map_x;
        $avgMapY+=$advert->address->map_y;
        $count++;
    }
}
if ($count > 0) {
    $mapX = $avgMapX / $count;
    $mapY = $avgMapY / $count;
}
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
foreach ($adverts as $advert) {
    $address = $advert->address;
    $content = array(
        '<b>Площадь:</b> '. $advert->space_total.
        ($advert->space_living ? '/'.$advert->space_living : '').
        ($advert->space_cookroom ? '/'.$advert->space_cookroom : ''),
        '<b>этаж</b> '.$advert->floor,
        '<b>цена</b> '.$advert->getHumanPrice()
    );
    $key = $address->map_x.'-'.$address->map_y;
    if (!isset($items[$key])) {
        $items[$key] = array('address' => $address,'texts' => array(),'floor_max' => $advert->floor_max);
    }
    $items[$key]['texts'][] = CHtml::link(
        implode(', ', $content),
        array('advert/view','id' => $advert->id),
        array('target'=>'_blank')
    );
}
foreach ($items as $adverts) {
    $address = 'Комплекс '. $adverts['address']->complex.
        ($adverts['address']->complex_house ? '/'.$adverts['address']->complex_house : '').
        ($adverts['address']->complex_structure ? '/'.$adverts['address']->complex_structure : '').
        ', этажей '.$adverts['floor_max'];
    $jsCode.='
    var marker = new google.maps.Marker({
        map:      map,
        position: new google.maps.LatLng(' . (float)$adverts['address']->map_x . ',' . (float)$adverts['address']->map_y .')
    });
    var win = new google.maps.InfoWindow();
    win.setContent("' . str_replace("\n", ' ', addslashes('<b>'.$address.'</b><br>'.implode('<br>', $adverts['texts']))) . '");
    marker.win = win;
    google.maps.event.addListener(marker, "click", (function(marker, win) {
        return function() {
            win.open(map, marker);
        }
    })(marker, win));
    markers.push(marker);
    ';
}
$jsCode.='';
$script->registerScript(
       'google_map_show',
           $jsCode,
           CClientScript::POS_READY
);
?>

<div class="info padding">
    <h1>Продажа квартир в Набережных Челнах</h1>
    <?php $this->renderPartial('_search',array(
        'model' => $model,
    )); ?>
</div>
<div class="info padding">
    <div class="map-items">
        <?php $this->widget('bootstrap.widgets.TbListView',array(
            'dataProvider'=>$provider,
            'template'=>'{summary}{sorter}<div class="search-items">{items}<div class="clear"></div></div>{pager}',
            'itemView'=>'_view',
            'ajaxUpdate' => false,
            'pager' => array('class'=>'bootstrap.widgets.TbPager','maxButtonCount' => 7)
        )); ?>
    </div>
    <div class="map" id="map_content">

    </div>
    <div class="clear"></div>
</div>