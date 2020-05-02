<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 15.03.2020
 * Time: 8:34
 * @var $this \yii\web\View
 * @var $context \module\design\section\ContactUs
 */
$context = $this->context;
?>
<section class="contact-us">
    <div class="container">
        <div data-parallax="{"y":"20%"}" class="contact-us-scroll">
            <div class="contact-us-wrapper">
                <div class="contact-us-content"><h2 class="title"><?=$context->title;?></h2>

                    <p class="text"><?=$context->content;?></p>

                    <div class="info-list">
                        <ul class="list-unstyled">
                            <?php if ($context->address):?>
                            <li class="info-line"><i class="info-icon fa fa-map-marker"></i><a href="#" class="info-text"><?=$context->address;?></a></li>
                            <?php endif;?>
                            <?php if ($context->phone):?>
                            <li class="info-line"><i class="info-icon fa fa-phone"></i><a href="tel:<?=$context->phone;?>" class="info-text"><?=$context->phone;?></a></li>
                            <?php endif;?>
                            <?php if ($context->email):?>
                            <li class="info-line"><i class="info-icon fa fa-envelope-o"></i><a href="mailto:<?=$context->email;?>" class="info-text"><?=$context->email;?></a></li>
                            <?php endif;?>
                            <?php if ($context->skype):?>
                            <li class="info-line"><i class="info-icon fa fa-skype"></i><a href="skype:<?=$context->skype;?>" class="info-text"><?=$context->skype;?></a></li>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="new-letter-wrapper">
                <div class="new-letter-content"><h4 class="title"><?=$context->title_subscribe;?></h4>

                    <p class="text"><?=$context->content_subscribe;?></p>

                    <form method="post" action="<?=\yii\helpers\Url::to($context->action_subscribe);?>"><input type="text" placeholder="Ваше имя" class="contact-form"/><input type="email" placeholder="Ваш Email" class="contact-form"/><textarea placeholder="Ваше сообщение" class="contact-form"></textarea><a href="#" class="btn btn-transparent white">Отправить</a></form>
                </div>
            </div>
        </div>
    </div>
</section>