<?php
/**
 * @var Advert $model
 * @var TbActiveForm $form
 */
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
));
?>
<div class="search_field">
    <?php echo $form->dropDownList($model,'type',Advert::getVariants(), array('class'=>'span2')); ?>
</div>
<div class="search_field">
    Этаж
    <div class="inputs">
    <?php echo $form->textField($model,'floor_from',array('class'=>'span1','placeholder'=>'от')); ?>
    <?php echo $form->textField($model,'floor_to',array('class'=>'span1','placeholder'=>'до')); ?>
    </div>
</div>
<div class="search_field">
    Этажность
    <div class="inputs">
    <?php echo $form->textField($model,'floor_max_from',array('class'=>'span1','placeholder'=>'от')); ?>
    <?php echo $form->textField($model,'floor_max_to',array('class'=>'span1','placeholder'=>'до')); ?>
    </div>

</div>
<div class="search_field">
    Общая площадь
    <div class="inputs">
    <?php echo $form->textField($model,'space_total_from',array('class'=>'span1','placeholder'=>'от')); ?>
    <?php echo $form->textField($model,'space_total_to',array('class'=>'span1','placeholder'=>'до')); ?>
    </div>
</div>
<div class="search_field">
    Жилая площадь
    <div class="inputs">
    <?php echo $form->textField($model,'space_living_from',array('class'=>'span1','placeholder'=>'от')); ?>
    <?php echo $form->textField($model,'space_living_to',array('class'=>'span1','placeholder'=>'до')); ?>
    </div>
</div>
<div class="search_field">
    Балкон
    <div class="inputs">
    <?php echo $form->checkBox($model,'balcony',array('value' => 'yes','uncheckValue' => '','class'=>'span1')); ?>
    </div>
</div>
<div class="search_field">
    Кухня
    <div class="inputs">
    <?php echo $form->textField($model,'space_cookroom_from',array('class'=>'span1','placeholder'=>'от')); ?>
    <?php echo $form->textField($model,'space_cookroom_to',array('class'=>'span1','placeholder'=>'до')); ?>
    </div>
</div>
<div class="search_field">
    Телефон
    <div class="inputs">
    <?php echo $form->checkBox($model,'phone',array('value' => 'yes','uncheckValue' => '','class'=>'span1')); ?>
    </div>
</div>
<div class="search_field">
    Железная дверь
    <div class="inputs">
    <?php echo $form->checkBox($model,'steel_door',array('value' => 'yes','uncheckValue' => '','class'=>'span1')); ?>
    </div>
</div>
<div class="search_field">
    Цена
    <div class="inputs">
    <?php echo $form->textField($model,'price_from',array('class'=>'span1','placeholder'=>'от')); ?>
    <?php echo $form->textField($model,'price_to',array('class'=>'span1','placeholder'=>'до')); ?>
    </div>
</div>
<div class="search_field">
    Комплексы
    <div class="inputs">
    <?php echo $form->textField($model,'complex',array('class'=>'span2','placeholder'=>'через запятую')); ?>
    </div>
</div>

<div class="search_field">
            <?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'submit',
                'type'=>'primary',
                'label'=>'Найти',
                'htmlOptions' => array('style' => 'width:200px')
            )); ?>
</div>
<?php $this->endWidget(); ?>
<div class="clear"></div>
