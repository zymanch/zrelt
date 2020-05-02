<?php
/**
 * @var SearchAdvert $model
 * @var Advert $advert
 * @var $this \yii\web\View
 */

use models\Advert;
use models\search\SearchAdvert;
use yii\helpers\Html;
$this->registerCssFile('/css/style.css');
$this->registerJsFile('https://api-maps.yandex.ru/2.1/?apikey='.\Yii::$app->params['yandex_map_key'].'&lang=ru_RU',['position' => \yii\web\View::POS_HEAD]);
$provider = $model->search(false);
$mapX = '55.7228988';
$mapY = '52.3955371';
$this->registerJs('
var resizeCallback = function() {
    $(\'#map_content\').height($(window).height()+\'px\');
    $(\'#map_content\').width($(window).width()+\'px\');
};
$( window ).resize(resizeCallback);
$( document ).ready(resizeCallback);');
$this->registerJs(
           '
           
           var markers = [];
           var map;',
           \yii\web\View::POS_HEAD
);
$adverts = $provider->getModels();

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
var myMap = new ymaps.Map("map_content", {
    center: ['.$mapX.', '.$mapY.'],
    zoom: 12,
    controls: ["zoomControl"]
});
var objectManager = new ymaps.ObjectManager({
    // Чтобы метки начали кластеризоваться, выставляем опцию.
    clusterize: true,
    // ObjectManager принимает те же опции, что и кластеризатор.
    gridSize: 32,
    clusterDisableClickZoom: true
});
// Чтобы задать опции одиночным объектам и кластерам,
// обратимся к дочерним коллекциям ObjectManager.
objectManager.objects.options.set(\'preset\', \'islands#greenDotIcon\');
objectManager.clusters.options.set(\'preset\', \'islands#greenClusterIcons\');
myMap.geoObjects.add(objectManager);
';

$items = array();
foreach ($adverts as $advert) {
    $address = $advert->address;
    $content = array(
        '<b>Площадь:</b> '. $advert->space_total.
        ($advert->space_living ? '/'.$advert->space_living : '').
        ($advert->space_cookroom ? '/'.$advert->space_cookroom : ''),
        '<b>Этаж</b> '.$advert->floor.'/'.$advert->floor_max,
        '<b>Цена</b> '.$advert->getHumanPrice().' ('.$advert->get1MeterPrice().')',
        '<hr>'.$advert->information
    );
    $items[] = [
        'type' => 'Feature',
        'id' => $advert->id,
        'geometry' => ['type' => 'Point','coordinates' => [$address->map_x, $address->map_y]],
        'properties' => [
            'balloonContentHeader' => (string)$address,
            'balloonContentBody' => implode('<br>',$content),
            'balloonContentFooter' => '<div class="text-right">'.Html::a(
                    'Смотреть детали',
                    array('advert/view','id' => $advert->id),
                    array('target'=>'_blank')
                ).'</div>',
        ]
    ];
}
$jsCode.='objectManager.add('.json_encode(['type'=>'FeatureCollection','features'=>$items]).');';
$this->registerJs(
           'ymaps.ready(function (){ '.$jsCode.'});',
    \yii\web\View::POS_READY
);
?>
<section id="main-slider" class="carousel">
    <div id="filter-panel" class="map-panel">
        <div class="slider-text">
            <div class="box-heading">
                <h3>Поиск жилья</h3>
                <span>Бесплатно</span><a href="tel:<?=\Yii::$app->params['phone'];?>">Позвонить риэлтору</a> </div>
            <?php echo $this->render('_mapSearch',array(
                'model' => $model,
            )); ?>
        </div>
    </div>
    <div id="map_content">

    </div>
</section>