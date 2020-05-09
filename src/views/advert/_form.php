<?php
/**
 * @var Advert $model
 * @var ActiveForm $form
 * @var \components\ImageUploader $uploader
 * @var $this \yii\web\View
 */

use models\Advert;
use yii\widgets\ActiveForm;

$isUser = Yii::$app->user->identity->type === \models\User::TYPE_USER;
//\assets\upload\Assets::register($this);
\assets\editable\Assets::register($this);
$this->registerJs('$("#advert-address_name").autocomplete({
    source: function (request, response) {
        jQuery.get("'.\yii\helpers\Url::to(['address/autocomplete']).'", {
            term: request.term
        }, function (data) {
            response(data.items);
        });
    }
});',\yii\web\View::POS_END);

//$this->registerJs('$("#advert-form input[type=file]").fileupload({
//    maxFileSize: 256*1024*1024,
//    acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
//    dataType: \'json\',
//        done: function (e, data) {
//            $.each(data.result.files, function (index, file) {
//                $(\'<p/>\').text(file.name).appendTo(document.body);
//            });
//        }
//});',\yii\web\View::POS_END);
$addresses = \models\Address::getVariants();
$maxFileSize = $uploader->fileUploadMaxSize();
?>
<div class="form">
<?php $form=ActiveForm::begin([
	'id'=>'advert-form',
	'method'=>'post',
	'enableAjaxValidation'=>false,
    'options' => ['enctype'=>'multipart/form-data']
]); ?>
    <?=\yii\helpers\Html::hiddenInput('MAX_FILE_SIZE',$maxFileSize);?>
	<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <div class="col-md-12">
            <?php echo $form->field($model,'type')->dropDownList(Advert::getVariants()); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?php echo $form->field($model,'address_name')->textInput(); ?>
        </div>
        <div class="col-md-3">
            <?php echo $form->field($model,'floor')->input('number'); ?>
        </div>
        <div class="col-md-3">

            <?php echo $form->field($model,'floor_max')->input('number'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?php echo $form->field($model,'space_total')->input('number'); ?>
        </div>
        <div class="col-md-3">
            <?php echo $form->field($model,'space_living')->input('number'); ?>
        </div>
        <div class="col-md-3">

            <?php echo $form->field($model,'space_cookroom')->input('number'); ?>
        </div>
        <div class="col-md-3">
            <?php echo $form->field($model,'balcony')->input('number'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php echo $form->field($model,'information')->textarea(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?php echo $form->field($model,'price')->input('number'); ?>
        </div>
        <div class="col-md-3">
            <?php echo $form
                ->field($model,'seller_id')
                ->dropDownList(
                   \yii\helpers\ArrayHelper::map($isUser ? [Yii::$app->user->identity->seller] : \models\Seller::find()->all(),'id','name'),
                   $isUser ? ['disabled'] : []
                ); ?>
        </div>
        <div class="col-md-3">
            <?php echo $form->field($model,'source_id')->dropDownList(\yii\helpers\ArrayHelper::map(\models\Source::find()->all(),'id','name')); ?>
        </div>
        <div class="col-md-3">
            <?php echo $form->field($model,'url')->textInput(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <label>Фотографии</label>
            <?=$form->field($uploader,'files[]')->fileInput(['multiple' => true, 'accept' => 'image/*'])->label(false);?>
            <div id="progress">
                <div class="bar" style="width: 0%;"></div>
            </div>
            <table role="presentation" class="table table-striped">
                <tbody class="files"></tbody>
            </table>
        </div>
    </div>

	<div class="form-actions">
		<input type="submit" class="btn btn-primary" value="<?=$model->isNewRecord ? 'Создать' : 'Сохранить';?>">
	</div>

<?php ActiveForm::end(); ?>
</div>