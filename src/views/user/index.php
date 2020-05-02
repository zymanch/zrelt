<?php
/* @var $this \yii\web\View */
/* @var $model SearchUser */

use models\search\SearchUser;
?>

<section class="property-query-area property-page-bg padding-top-74">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <img src="/images/head-top-2.png" alt="image">
                <h2 class="pading-20-0 white">Пользователи</h2>
            </div>
        </div>
        <div class="row">

            <?=$this->render('_search',array(
                'model' => $model,
            )); ?>
        </div>
    </div>
</section>
<section class="services-section">
    <div class="container">
        <div class="row padding-bottom-64">

            <?= yii\widgets\ListView::widget([
                'dataProvider'=>$model->search(),
                'itemView'=>'_view',
            ]); ?>
        </div>
    </div>
</section>