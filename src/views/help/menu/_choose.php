<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 20.02.2020
 * Time: 22:55
 */
?>
<div class="blog_info blog-thumbnail">
    <div class="blogimagedescription">
        <h3>Статьи</h3>
    </div>
    <ul class="archieves">
        <li><?=\yii\helpers\Html::a('Выбор квартиры', ['help/'.\controllers\HelpController::HELP_CHOOSE_ALIAS]);?></li>
        <li><?=\yii\helpers\Html::a('О правомочиях продавца', ['help/'.\controllers\HelpController::HELP_SELLER_ALIAS]);?></li>
    </ul>
</div>
<div class="blog_info blog-thumbnail">
    <div class="blogimagedescription">
        <h3>Проверка квартиры</h3>
    </div>
    <ul class="archieves">
        <li><?=\yii\helpers\Html::a('Проверка квартиры', ['help/'.\controllers\HelpController::HELP_CHECK_ALIAS]);?></li>
        <li><?=\yii\helpers\Html::a('Проверка документов', ['help/'.\controllers\HelpController::HELP_DOCS_CHECK_ALIAS]);?></li>
        <li><?=\yii\helpers\Html::a('О прописанных лицах', ['help/'.\controllers\HelpController::HELP_PEOPLE_ALIAS]);?></li>
        <li><?=\yii\helpers\Html::a('О притязаниях и судебных спорах', ['help/'.\controllers\HelpController::HELP_DISPUTE_ALIAS]);?></li>
        <li><?=\yii\helpers\Html::a('Об обременениях и арестах', ['help/'.\controllers\HelpController::HELP_ENCUMBRANCE_ALIAS]);?></li>
        <li><?=\yii\helpers\Html::a('Долги по коммунальным платежам', ['help/'.\controllers\HelpController::HELP_DEBT_ALIAS]);?></li>
        <li><?=\yii\helpers\Html::a('Проверяем законность перепланировки', ['help/'.\controllers\HelpController::HELP_REDEVELOPMENT_ALIAS]);?></li>

    </ul>
</div>
<div class="blog_info blog-thumbnail">
    <div class="blogimagedescription">
        <h3>Покупка квартиры</h3>
    </div>
    <ul class="archieves">
        <li><?=\yii\helpers\Html::a('Как правильно оформить покупку квартиры', ['help/'.\controllers\HelpController::HELP_SALE_ALIAS]);?></li>
        <li><?=\yii\helpers\Html::a('Заключение предварительного договора', ['help/'.\controllers\HelpController::HELP_CONTRACT_ALIAS]);?></li>
        <li><?=\yii\helpers\Html::a('Что нужно знать о задатке', ['help/'.\controllers\HelpController::HELP_DEPOSIT_ALIAS]);?></li>
        <li><?=\yii\helpers\Html::a('Составление документов для регистрации', ['help/'.\controllers\HelpController::HELP_DOCS_ALIAS]);?></li>
    </ul>
</div>