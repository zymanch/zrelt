<?php
/**
 * @var \models\Advert $model
 * @var $this \yii\web\View
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
$panoramas = $model->getPanoramas();
?>
<section>
    <div class="container">
        <div class="inner-contact-agent-area">
            <h1 class="padding-bottom-64">Панорама для <?php echo Html::encode($model->address);?>
            </h1>

            <div class="form">
                <?php $form=ActiveForm::begin([
                    'id'=>'panorama-form',
                    'method'=>'post',
                    'enableAjaxValidation'=>false
                ]); ?>
                <table style="width: 100%">
                    <colgroup>
                        <col width="25%"/>
                        <col width="25%"/>
                        <col width="25%"/>
                        <col width="25%"/>
                    </colgroup>
                    <?php foreach ($panoramas as $image):?>
                        <tr>
                            <td colspan="1" style="vertical-align: top;text-align: right"><img height="40px" src="<?=$image->getPanoramaUrl();?>"> </td>
                            <td colspan="1"><?=$form->field($image,'['.$image->id.']name')->label(false)->textInput(['value'=>$image->name]);?></td>
                        </tr>
                        <tr>
                            <?php foreach ($image->imageLinks as $index => $link):?>
                                <td>
                                    <?=Html::dropDownList('ImageLink['.$image->id.']['.$index.'][to_image_id]', $link->to_image_id,\yii\helpers\ArrayHelper::map($panoramas,'id','name'),['prompt'=>'-','style'=>'width:100px;height:40px;float:left;']);?>
                                    <?=Html::textInput('ImageLink['.$image->id.']['.$index.'][x]', $link->x,['placeholder'=>'x,%','class'=>'form-control','style'=>'width:60px;float:left;']);?>
                                    <?=Html::textInput('ImageLink['.$image->id.']['.$index.'][y]', $link->x,['placeholder'=>'y,%','class'=>'form-control','style'=>'width:60px;float:left;']);?>
                                </td>
                            <?php endforeach;?>
                            <?php for ($i=count($image->imageLinks);$i<4;$i++):?>
                                <td>
                                    <?=Html::dropDownList('ImageLink['.$image->id.']['.$i.'][to_image_id]', null,\yii\helpers\ArrayHelper::map($panoramas,'id','name'),['prompt'=>'-','style'=>'width:100px;height:40px;float:left;']);?>
                                    <?=Html::textInput('ImageLink['.$image->id.']['.$i.'][x]', '',['placeholder'=>'x,%','class'=>'form-control','style'=>'width:60px;float:left;']);?>
                                    <?=Html::textInput('ImageLink['.$image->id.']['.$i.'][y]', '',['placeholder'=>'y,%','class'=>'form-control','style'=>'width:60px;float:left;']);?>
                                </td>
                            <?php endfor;?>
                        </tr>
                    <?php endforeach;?>
                </table>
                <div class="form-actions">
                    <input type="submit" class="btn btn-primary" value="Сохранить">
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>

