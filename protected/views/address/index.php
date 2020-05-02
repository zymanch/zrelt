<?php
/**
 * @var array $tree
 * @var Address $address
 */
Yii::app()->clientScript->registerCssFile('/css/complex.css');
?>
<section id="addresses" class="carousel">
    <div class="container">
        <div class="row padding-bottom-64">
            <div class="col-md-12 text-center"> <img src="/images/head-top.png" alt="image">
                <h2 class="pading-20-0">Адреса по комплексам</h2>
            </div>
        </div>
        <div class="row">
            <?php foreach ($tree as $complex => $addresses):?>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="single-effectinfo">
                        <div class="wpf-property padding complex-view">
                            <h2>Комплекс <?php echo CHtml::encode($complex);?></h2>
                            <?php foreach ($addresses as $address):?>
                                <div class="address">
                                    <?php echo CHtml::link(
                                        CHtml::encode($address->complex_house.($address->complex_structure?'/'.$address->complex_structure:'')),
                                        array('address/view','id' => $address->id)
                                    );?>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</section>
