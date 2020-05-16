<?php
/**
 * @var SearchAdvert $model
 */

use models\search\SearchAdvert;

?>
<section id="property">
    <div class="container">
        <div class="row padding-bottom-64">
            <div class="col-md-12">
                <h1>Мои объявления</h1>
            </div>
        </div>
        <div class="row">
            <?=\yii\widgets\ListView::widget([
                'id' => 'search-result',
                'dataProvider'=>$model->search(),
                'sorter' => [
                    'options' => ['class'=>'pagination']
                ],
                'layout'=>'<div class="search-items">{items}<div class="clear"></div></div>{pager}',
                'itemView'=>'_view',
            ]); ?>
        </div>
    </div>
</section>