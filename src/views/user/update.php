<?php
/* @var $this \yii\web\View */

use yii\bootstrap\Html;

/* @var $model User */
?>
<section>
    <div class="container">
        <div class="inner-contact-agent-area">
            <h1 class="padding-bottom-64">Редактирование  <?php echo Html::encode($model->email); ?></h1>

            <?=$this->render('_form', array('model'=>$model)); ?>
        </div>
    </div>
</section>
