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
        <li><?=CHtml::link('Выбор квартиры', ['help/'.HelpController::HELP_CHOOSE_ALIAS]);?></li>
        <li><?=CHtml::link('О правомочиях продавца', ['help/'.HelpController::HELP_SELLER_ALIAS]);?></li>
    </ul>
</div>
<div class="blog_info blog-thumbnail">
    <div class="blogimagedescription">
        <h3>Проверка квартиры</h3>
    </div>
    <ul class="archieves">
        <li><?=CHtml::link('Проверка квартиры', ['help/'.HelpController::HELP_CHECK_ALIAS]);?></li>
        <li><?=CHtml::link('Проверка документов', ['help/'.HelpController::HELP_DOCS_CHECK_ALIAS]);?></li>
        <li><?=CHtml::link('О прописанных лицах', ['help/'.HelpController::HELP_PEOPLE_ALIAS]);?></li>
        <li><?=CHtml::link('О притязаниях и судебных спорах', ['help/'.HelpController::HELP_DISPUTE_ALIAS]);?></li>
        <li><?=CHtml::link('Об обременениях и арестах', ['help/'.HelpController::HELP_ENCUMBRANCE_ALIAS]);?></li>
        <li><?=CHtml::link('Долги по коммунальным платежам', ['help/'.HelpController::HELP_DEBT_ALIAS]);?></li>
        <li><?=CHtml::link('Проверяем законность перепланировки', ['help/'.HelpController::HELP_REDEVELOPMENT_ALIAS]);?></li>

    </ul>
</div>
<div class="blog_info blog-thumbnail">
    <div class="blogimagedescription">
        <h3>Покупка квартиры</h3>
    </div>
    <ul class="archieves">
        <li><?=CHtml::link('Как правильно оформить покупку квартиры', ['help/'.HelpController::HELP_SALE_ALIAS]);?></li>
        <li><?=CHtml::link('Заключение предварительного договора', ['help/'.HelpController::HELP_CONTRACT_ALIAS]);?></li>
        <li><?=CHtml::link('Что нужно знать о задатке', ['help/'.HelpController::HELP_DEPOSIT_ALIAS]);?></li>
        <li><?=CHtml::link('Составление документов для регистрации', ['help/'.HelpController::HELP_DOCS_ALIAS]);?></li>
    </ul>
</div>