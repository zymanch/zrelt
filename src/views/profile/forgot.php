<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 23.04.2020
 * Time: 23:25
 */
?>
<?php \module\design\section\Error::begin([
    'message' => 'Страница в разработке',
    'buttons' => [
        ['label'=>'На главную','url'=>['advert/map']],
    ]
]);?>
Страница в разработке, пожалуйста, воспользуйтесь другими пунктами меню.

<?php \module\design\section\Error::end();?>