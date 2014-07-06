<?php
/**
 * @var array $tree
 * @var Address $address
 */
Yii::app()->clientScript->registerCssFile('/css/complex.css');
?>
<?php foreach ($tree as $complex => $addresses):?>
    <div class="info padding complex-view">
        <h2>Комплекс <?php echo CHtml::encode($complex);?></h2>
        <?php foreach ($addresses as $address):?>
            <div class="address">
                <?php echo CHtml::link(
                    CHtml::encode($address->complex_house.($address->complex_structure?'/'.$address->complex_structure:'')),
                    array('address/view','id' => $address->id)
                );?>
            </div>
        <?php endforeach;?>
        <div class="clear"></div>
    </div>
<?php endforeach;?>