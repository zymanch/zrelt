<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 15.03.2020
 * Time: 8:34
 * @var $this \yii\web\View
 * @var $context \module\design\section\Error
 */
$context = $this->context;
?>
<section id="error" class="container text-center pading">
    <h1 class="pading-20-0"><?=$context->message;?></h1>
    <p class="pading-20-0"><?=$context->content;?></p>
    <?php foreach ($context->buttons as $button):?>
        <?=\yii\helpers\Html::a($button['label'],$button['href'],['class'=>'btn btn-primary']);?>
    <?php endforeach;;?>
</section>
