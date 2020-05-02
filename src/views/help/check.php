<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 20.02.2020
 * Time: 22:12
 * @var $this CController
 */
?>
<section>
    <div id="blog_post_page_information" class="blog_page_information">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <h1>Как самостоятельно проверить квартиру перед покупкой</h1>
                    <p class="blog_discription_paragraphs">
                        Это один из самых ответственных этапов. Вы должны затратить максимальные усердия на проверку,
                        что бы в дальнейшем не было проблем и неприятностей. Перед покупкой квартиру обязательно проверяют на:
                    </p>
                    <ul class="row bolg_post_list">
                        <li class="col-xs-12"> <b>подлинность и достоверность правоустанавливающих и правоподтверждающих документов </b></li>
                        <li class="col-xs-12"> правомочность продавца (продавцов) и его правовую репутацию </li>
                        <li class="col-xs-12"> наличие (отсутствие) прописанных лиц (особое внимание на временно выписанных) </li>
                        <li class="col-xs-12"> притязания посторонних лиц (в том числе возможные претенденты-наследники) и судебные споры </li>
                        <li class="col-xs-12"> обременения (аренда, рента, ипотека) и аресты </li>
                        <li class="col-xs-12"> долги по коммунальным платежам </li>
                        <li class="col-xs-12"><b> законность планировки</b>
                    </ul>
                </div>
                <div class="col-md-4 col-lg-4">
                    <?php $this->render('//help/menu/_choose');?>
                </div>
            </div>
        </div>
    </div>
</section>
