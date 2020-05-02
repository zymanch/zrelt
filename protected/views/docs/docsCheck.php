<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 20.02.2020
 * Time: 22:12
 */
?>
<section>
    <div id="blog_post_page_information" class="blog_page_information">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <h1></h1>
                    <p class="blog_discription_paragraphs">
                        У продавца должны быть на руках документы правового и технического характера, а именно:
                    </p>
                    <ul class="row bolg_post_list">
                        <li class="col-xs-12">свидетельство о праве собственности или выписка из ЕГРН (можно получить самую свежую самостоятельно, в росреестре или, например, на сайте ktotam.pro)</li>
                        <li class="col-xs-12">договор на квартиру (договор приватизации, купли-продажи, мены, дарения, акт приема-передачи от застройщика и пр.)</li>
                        <li class="col-xs-12">свидетельство о наследстве (если досталась по наследству)</li>
                        <li class="col-xs-12">кадастровый паспорт</li>
                        <li class="col-xs-12">технический паспорт</li>
                    </ul>
                </div>
                <div class="col-md-4 col-lg-4">
                    <?php $this->renderPartial('//docs/menu/_choose');?>
                </div>
            </div>
        </div>
    </div>
</section>