<?php
/**
 * @var Advert $data
 */
?>
<a href="<?php echo CHtml::normalizeUrl(array('views','id' => $data->id));?>" class="view">


    <div class="type">
        <?php echo $data->getTypeLabel(); ?>
    </div>

    <div class="floor">
        <b>Этаж:</b>
        <?php echo $data->floor; ?>/<?php echo $data->floor_max; ?>
    </div>

    <div class="space">
        <b>Площадь:</b>
        <?php echo CHtml::encode($data->space_total); ?>
        <?php if ($data->space_living):?>
        / <?php echo CHtml::encode($data->space_living); ?>
        <?php endif;?>
        <?php if ($data->space_cookroom):?>
        / <?php echo CHtml::encode($data->space_cookroom); ?>
        <?php endif;?>
    </div>

    <div class="additional">
        <?php if (!is_null($data->balcony)):?>
            <?php if($data->balcony > 0):?>
                <span class="exist" rel="tooltip" title="Балкон: <?php echo $data->balcony == 1 ? 'есть' : $data->balcony.'м';?>">Бал.</span>
            <?php else:?>
                <span class="not-exist" rel="tooltip" title="Балкон: нет">Бал.</span>
            <?php endif;?>
        <?php endif;?>

        <?php if (!is_null($data->phone)):?>
            <?php if($data->phone == 'yes'):?>
                <span class="exist" rel="tooltip" title="Телефон: есть">Тел.</span>
                <?php else:?>
                <span class="not-exist" rel="tooltip" title="Телефон: нет">Тел.</span>
            <?php endif;?>
        <?php endif;?>

        <?php if (!is_null($data->steel_door)):?>
            <?php if($data->steel_door == 'yes'):?>
                <span class="exist" rel="tooltip" title="Железная дверь: есть">Двр.</span>
            <?php else:?>
                <span class="not-exist" rel="tooltip" title="Железная дверь: нет">Двр.</span>
            <?php endif;?>
        <?php endif;?>
    </div>

    <div class="address">
        <b>Адрес:</b>
        <?php if ($data->address->complex):?>
            <?php echo CHtml::encode($data->address->complex); ?>
            <?php if ($data->address->complex_house):?>
                / <?php echo CHtml::encode($data->address->complex_house); ?>
            <?php endif;?>
            <?php if ($data->address->complex_structure):?>
                / <?php echo CHtml::encode($data->address->complex_structure); ?>
            <?php endif;?>
        <?php else:?>
            <?php echo CHtml::encode($data->address->street); ?>
            <?php if ($data->address->street_house):?>
                / <?php echo CHtml::encode($data->address->street_house); ?>
            <?php endif;?>
            <?php if ($data->address->street_structure):?>
                / <?php echo CHtml::encode($data->address->street_structure); ?>
            <?php endif;?>
        <?php endif;?>
    </div>

    <div class="price">
        <b>Цена:</b>
        <?php echo number_format($data->price); ?> руб.
    </div>

</a>