<?php
/**
 * @var SearchAdvert $model
 */

use models\search\SearchAdvert;

?>
<section class="property-query-area property-page-bg padding-top-74">
    <div class="container">
        <div class="row padding-bottom-64">
            <div class="col-md-12 text-center">
                <img src="/images/head-top-2.png" alt="image">
                <h2 class="pading-20-0 white">Продажа квартир в Набережных Челнах</h2>
            </div>
        </div>
        <div class="row">

            <?=$this->render('_search',array(
                'model' => $model,
            )); ?>
        </div>
    </div>
</section>
<section id="property">
    <div class="container">
        <div class="row padding-bottom-64">
            <?=\yii\widgets\ListView::widget([
                'id' => 'search-result',
                'dataProvider'=>$model->search(),
                'sorter' => [
                    'options' => ['class'=>'pagination']
                ],
                'layout'=>'{summary}{sorter}<div class="search-items">{items}<div class="clear"></div></div>{pager}',
                'itemView'=>'_view',
            ]); ?>
        </div>
    </div>
</section>