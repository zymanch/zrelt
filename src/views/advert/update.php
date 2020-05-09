<?php
/**
 * @var \models\Advert $model
 */

use yii\helpers\Html;

?>
<section>
    <div class="container">
        <div class="inner-contact-agent-area">
            <h1 class="padding-bottom-64">Дом <?php echo Html::encode($model->address->complex);?>
                    <?php if ($model->address->complex_house):?>
                        / <?php echo Html::encode($model->address->complex_house);?>
                    <?php endif;?>
                    <?php if ($model->address->complex_structure):?>
                        / <?php echo Html::encode($model->address->complex_structure);?>
                    <?php endif;?></h2>
            </h1>

        <?php echo $this->render('_form',array('model'=>$model,'uploader'=>$uploader)); ?>
        </div>
    </div>
</section>
