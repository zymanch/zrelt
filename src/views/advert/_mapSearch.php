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
    location.href = path;
    return false;
});');
$form=ActiveForm::begin([
    'id' => 'search-form',
	'action'=> [$this->context->route],
	'method'=>'get',
]);
?>


<div class="area-box text-left">
    <ul>
        <li><i class="fa fa-home" aria-hidden="true"></i></li>
        <li>
            <p>Объект</p>
            <?php echo Html::dropDownList('type', $model->type,Advert::getVariants(),['class'=>'form-control col-xs-12','empty'=>'']); ?>
        </li>
    </ul>
</div>
<div class="area-box text-left">
    <ul>
        <li><i class="fa fa-columns" aria-hidden="true"></i></li>
        <li>
            <p>Площадь, м<sup>2</sup> </p>
            <?php echo Html::input('text','space_total_from', $model->space_total_from,['class'=>'form-control col-xs-range','placeholder'=>'от']); ?>
            <?php echo Html::input('text','space_total_to', $model->space_total_to,['class'=>'form-control col-xs-range','placeholder'=>'до']); ?>
        </li>
    </ul>
</div>
<div class="area-box text-left">
    <ul>
        <li><i class="fa fa-rub" aria-hidden="true"></i></li>
        <li>
            <p>Цена, &#8381;</p>
            <?php echo Html::input('text','price_from', $model->price_from,['class'=>'form-control col-xs-range','placeholder'=>'от']); ?>
            <?php echo Html::input('text','price_to', $model->price_to,['class'=>'form-control col-xs-range','placeholder'=>'до']); ?>
        </li>
    </ul>
</div>

<!--
<div class="area-box text-left">
    <ul>
        <li><i class="fa fa-car" aria-hidden="true"></i></li>
        <li>
            <p>Garages </p>
            <strong>1</strong></li>
    </ul>
</div>
<div class="area-box text-left">
    <ul>
        <li><i class="fa fa-home" aria-hidden="true"></i></li>
        <li>
            <p>Type </p>
            <strong>Single Family</strong></li>
    </ul>
</div>
<input class="animation btn-slide" type="submit" value="Найти">

<div class="search_field">
    Этаж
    <div class="inputs">
    <?php echo $form->field($model,'floor_from')->textInput(array('class'=>'span1','placeholder'=>'от'))->label(false); ?>
    <?php echo $form->field($model,'floor_to')->textInput(array('class'=>'span1','placeholder'=>'до'))->label(false); ?>
    </div>
</div>
<div class="search_field">
    Этажность
    <div class="inputs">
    <?php echo $form->field($model,'floor_max_from')->textInput(array('class'=>'span1','placeholder'=>'от'))->label(false); ?>
    <?php echo $form->field($model,'floor_max_to')->textInput(array('class'=>'span1','placeholder'=>'до'))->label(false); ?>
    </div>

</div>
<div class="search_field">
    Жилая площадь
    <div class="inputs">
    <?php echo $form->field($model,'space_living_from')->textInput(array('class'=>'span1','placeholder'=>'от'))->label(false); ?>
    <?php echo $form->field($model,'space_living_to')->textInput(array('class'=>'span1','placeholder'=>'до'))->label(false); ?>
    </div>
</div>
<div class="search_field">
    Балкон
    <div class="inputs">
    <?php echo $form->field($model,'balcony')->checkbox(array('value' => 'yes','uncheckValue' => '','class'=>'span1'))->label(false); ?>
    </div>
</div>
<div class="search_field">
    Кухня
    <div class="inputs">
    <?php echo $form->field($model,'space_cookroom_from')->textInput(array('class'=>'span1','placeholder'=>'от'))->label(false); ?>
    <?php echo $form->field($model,'space_cookroom_to')->textInput(array('class'=>'span1','placeholder'=>'до'))->label(false); ?>
    </div>
</div>
<div class="search_field">
    Телефон
    <div class="inputs">
    <?php echo $form->field($model,'phone')->checkbox(['value' => 'yes','uncheckValue' => '','class'=>'span1'])->label(false); ?>
    </div>
</div>
<div class="search_field">
    Железная дверь
    <div class="inputs">
    <?php echo $form->field($model,'steel_door')->checkbox(['value' => 'yes','uncheckValue' => '','class'=>'span1'])->label(false); ?>
    </div>
</div>
<div class="search_field">
    Комплексы
    <div class="inputs">
    <?php echo $form->field($model,'complex')->textInput(array('class'=>'span2','placeholder'=>'через запятую'))->label(false); ?>
    </div>
</div>
-->
<div class="text-center">
    <input class="animation btn-slide" type="submit" value="Найти">
</div>
<?php ActiveForm::end(); ?>
<div class="clear"></div>
