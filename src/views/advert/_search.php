<?php
/**
 * @var SearchAdvert $model
 * @var ActiveForm $form
 * @var \yii\web\View $this
 */

use models\Advert;
use models\search\SearchAdvert;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->registerJs('
$("#search-form").submit(function() {
    var $form = $(this),
        fields = $form.serializeArray(),
        path = $form.attr("action"),
        firstAdded = false;
    for (var i=0;i<fields.length;i++) {
        if (fields[i].value) {
            path+= firstAdded ? "&":"?";
            path+= fields[i].name+"="+encodeURIComponent(fields[i].value);
            firstAdded = true;
        }
    }
    location.href = path+"#search-result";
    return false;
});');
$form=ActiveForm::begin(array(
    'id' => 'search-form',
	'action'=>[$this->context->route],
	'method'=>'get',
));
?>
<div class="col-md-3 col-sm-6">
    <div class="single-query">
        <label>Объект</label>
        <?php echo Html::dropDownList('type',$model->type,Advert::getVariants(), ['empty'=>'Все']); ?>
    </div>
</div>
<div class="col-md-3 col-sm-6">
    <div class="single-query">
        <label>Этаж</label>
        <div class="clear"></div>
        <?php echo Html::input('number','floor_from', $model->floor_from,['class'=>'col-xs-6','placeholder'=>'от']); ?>
        <?php echo Html::input('number','floor_to', $model->floor_to,['class'=>'col-xs-6','placeholder'=>'до']); ?>
    </div>
</div>
<div class="col-md-3 col-sm-6">
    <div class="single-query">
        <label>Этажность</label>
        <div class="clear"></div>
        <?php echo Html::input('number','floor_max_from', $model->floor_max_from,['class'=>'col-xs-6','placeholder'=>'от']); ?>
        <?php echo Html::input('number','floor_max_to', $model->floor_max_to,['class'=>'col-xs-6','placeholder'=>'до']); ?>
    </div>
</div>
<div class="col-md-3 col-sm-6">
    <div class="single-query">
        <label>Общая площадь</label>
        <div class="clear"></div>
        <?php echo Html::input('number','space_total_from', $model->space_total_from,['class'=>'col-xs-6','placeholder'=>'от']); ?>
        <?php echo Html::input('number','space_total_to', $model->space_total_to,['class'=>'col-xs-6','placeholder'=>'до']); ?>
    </div>
</div>
<div class="col-md-3 col-sm-6">
    <div class="single-query">
        <label>Жилая площадь</label>
        <div class="clear"></div>
        <?php echo Html::input('number','space_living_from', $model->space_living_from,['class'=>'col-xs-6','placeholder'=>'от']); ?>
        <?php echo Html::input('number','space_living_to', $model->space_living_to,['class'=>'col-xs-6','placeholder'=>'до']); ?>
    </div>
</div>
<div class="col-md-3 col-sm-6">
    <div class="single-query">
        <label>Кухня</label>
        <div class="clear"></div>
        <?php echo Html::input('number','space_cookroom_from', $model->space_cookroom_from,['class'=>'col-xs-6','placeholder'=>'от']); ?>
        <?php echo Html::input('number','space_cookroom_to', $model->space_cookroom_to,['class'=>'col-xs-6','placeholder'=>'до']); ?>
    </div>
</div>
<div class="col-md-3 col-sm-6">
    <div class="single-query">
        <label>Цена</label>
        <div class="clear"></div>
        <?php echo Html::input('number','price_from', $model->price_from,['class'=>'col-xs-6','placeholder'=>'от']); ?>
        <?php echo Html::input('number','price_to', $model->price_to,['class'=>'col-xs-6','placeholder'=>'до']); ?>
    </div>
</div>
<div class="col-md-3 col-sm-6">
    <div class="single-query">
    <label>Комплексы</label>
        <?php echo Html::input('text','complex', $model->complex,['class'=>'','placeholder'=>'через запятую']); ?>
    </div>
</div>

<div class="col-md-6 text-right">
    <div class="query-submit-button">
        <input type="submit" class="btn-slide" value="Найти">
    </div>
</div>
<?php ActiveForm::end(); ?>
<div class="clear"></div>
