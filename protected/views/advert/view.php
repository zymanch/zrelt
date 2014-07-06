<?php
/**
 * @var Advert $model
 */
?>
<div class="info padding">
    <h1>
        Квартира <?php echo CHtml::encode($model->address->complex);?>
        <?php if ($model->address->complex_house):?>
            / <?php echo CHtml::encode($model->address->complex_house);?>
        <?php endif;?>
        <?php if ($model->address->complex_structure):?>
            / <?php echo CHtml::encode($model->address->complex_structure);?>
        <?php endif;?>
        на <?php echo $model->floor;?>/<?php echo $model->floor_max;?> этаже
    </h1>

    <?php $this->widget('bootstrap.widgets.TbDetailView',array(
        'data'=>$model,
        'attributes'=>array(
            'id',
            'type',
            'address_id',
            'floor',
            'floor_max',
            'space_total',
            'space_living',
            'space_cookroom',
            'balcony',
            'phone',
            'steel_door',
            'information',
            'price',
            'seller_id',
            'source_id',
            'url',
            'created',
            'expired',
            'status',
            'changed',
        ),
    )); ?>
</div>