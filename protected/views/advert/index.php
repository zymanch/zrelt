<?php
/**
 * @var SearchAdvert $model
 */
Yii::app()->clientScript->registerCssFile('/css/advert.css');
?>

<div class="info padding">
    <h1>Продажа квартир в Набережных Челнах</h1>
    <?php $this->renderPartial('_search',array(
        'model' => $model,
    )); ?>
</div>
<div class="info padding">
    <?php $this->widget('bootstrap.widgets.TbListView',array(
        'dataProvider'=>$model->search(),
        'template'=>'{summary}{sorter}<div class="search-items">{items}<div class="clear"></div></div>{pager}',
        'itemView'=>'_view',
    )); ?>
</div>