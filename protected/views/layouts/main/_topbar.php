<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 16.02.2020
 * Time: 13:49
 */
?>
<div class="topbar">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <ul class="contactinfo">
                    <li><a href="tel:<?=Yii::app()->params['adminPhone'];?>"><i class="fa fa-phone-square"></i><?=Yii::app()->params['adminPhone'];?></a></li>
                    <li><a href="mailto:<?=Yii::app()->params['adminEmail'];?>"><i class="fa fa-envelope"></i> <?=Yii::app()->params['adminEmail'];?></a></li>
                </ul>
            </div>
            <div class="col-md-5 text-right">

                <ul class="shop-menu">
                    <?php if (Yii::app()->user->isGuest):?>
                    <li><a href="/site/login"><i class="fa fa-lock"></i> Вход</a></li>
                    <li><a href="/site/register" ><i class="fa fa-sign-in"></i> Регистрация</a></li>
                    <?php else:?>
                    <li><a href="/site/logout"><i class="fa fa-sign-in"></i> Выход</a></li>
                    <?php endif;?>
                </ul>

                <div class="topbar-social-icons"> <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> <a href="$"><i class="fa fa-twitter" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </div>
            </div>
        </div>
    </div>
</div>
