<?php

use yii\helpers\Html;

\Yii::$app->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('advert-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<section class="property-query-area property-page-bg padding-top-74 search-form" style="display:none">
    <div class="container">
        <div class="row padding-bottom-64">
            <div class="col-md-12 text-center">
                <img src="/images/head-top-2.png" alt="image">
                <h2 class="pading-20-0 white">Продажа квартир в Набережных Челнах</h2>
            </div>
        </div>
        <div class="row">

            <?php $this->render('_search',array(
                'model' => $model,
            )); ?>
        </div>
    </div>
</section>


<section id="property">
    <div class="container">
        <div class="row padding-bottom-64">
            <h1>Администрирование объявлений</h1>

            Используйте <?php echo Html::a('расширенный поиск','#',array('class'=>'search-button btn')); ?>
<?php include __DIR__.'/../../extensions/bootstrap/widgets/TbPager.php';?>
            <?php $this->widget('bootstrap.widgets.TbGridView',array(
                'id'=>'advert-grid',
                'dataProvider'=>$model->search(),
                'filter'=>$model,
                'pagerCssClass' => 'inner-page-gallery-two-columns-dimension-btn',
                'columns'=>array(
                    'id',
                    [
                        'name' => 'type',
                        'value' => function(Advert $advert) {
                            return $advert->getTypeLabel();
                        }
                    ],
                    [
                        'name' => 'address_id',
                        'value' => function (Advert $advert) {
                            return $advert->address;
                        }
                    ],
                    'space_total',
                    [
                        'name' => 'price',
                        'type' => 'raw',
                        'value' => function(Advert $advert) {
                            return $advert->getHumanPrice();
                        }
                    ],
                    [
                        'name'=>'seller_id',
                        'value' => function(Advert $advert) {
                            return $advert->seller->name;
                        },
                    ],
                    'created',
                    array(
                        'class'=>'bootstrap.widgets.TbButtonColumn',
                    ),
                ),
            )); ?>
        </div>
    </div>
</section>
