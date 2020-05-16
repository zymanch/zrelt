<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 23.04.2020
 * Time: 23:25
 * @var $this \yii\web\View
 * @var $model \models\Advert
 * @var $images \models\Image[]
 */
\assets\panorama\Assets::register($this);
$panoramas = [];
$js = '

      var progressElement = document.getElementById( "progress" );

      function onEnter ( event ) {

        progressElement.style.width = 0;
        progressElement.classList.remove( "finish" );

      }

      function onProgress ( event ) {

        progress = event.progress.loaded / event.progress.total * 100;
        progressElement.style.width = progress + "%";
        if ( progress === 100 ) {
          progressElement.classList.add( "finish" );
        }

      }
      ';
foreach ($images as $image) {
    $name = 'panorama'.$image->id;
    $js.=sprintf('
        var %1$s = new PANOLENS.ImagePanorama( "%2$s" );
        %1$s.addEventListener( "progress", onProgress );
        %1$s.addEventListener( "enter", onEnter );
    ', $name, $image->getPanoramaUrl());
    $panoramas[] = $name;
}
foreach ($images as $image) {
    foreach ($image->imageLinks as $link) {
        $nameFrom = 'panorama'.$link->from_image_id;
        $nameTo = 'panorama'.$link->to_image_id;
        $js .= $nameFrom.'.link( '.$nameTo.', new THREE.Vector3( '.round($image->width * $link->x/100).', '.round($image->height * $link->y/100).', 0 ) );';
    }

}
$js.='viewer = new PANOLENS.Viewer();
viewer.add('.implode(',',$panoramas).');';


$this->registerJs($js);
?>
<div id="progress"></div>
<?=\yii\helpers\Html::a('Вернуться',['advert/view','id'=>$model->id],['id'=>'return-back','class'=>'btn btn-default']);?>