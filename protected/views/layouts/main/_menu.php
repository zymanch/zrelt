<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 16.02.2020
 * Time: 13:50
 */
?>
<header id="navigation header-container-box" class="navigation affix-top menu-line" data-offset-top="2" data-spy="affix">
    <div class="container" id="menu-nav">
        <div class="row">
            <div class="col-md-3">
                <div class="logo">
                    <a href="/"><img alt="Logo" src="/images/logo2.png" id="logo-header"><?=Yii::app()->name;?></a>
                </div></div><!-- /.logo -->
            <div class="col-md-7">
                <a class="visible-xs" href="#mobile-menu" id="mobile-menu-button"><i class="fa fa-bars"></i></a>
                <nav id="navigation">
                    <ul>
                        <?php foreach ($this->menu as $menu):?>
                            <?php if (isset($menu['items'])):?>
                                <li class="has_submenu">
                                    <a href="#" class="hvr-overline-from-center"><?=$menu['label'];?></a>
                                    <ul>
                                        <?php foreach ($menu['items'] as $subMenu):?>
                                            <li><?php echo CHtml::link($subMenu['label'], $subMenu['url']);?></li>
                                        <?php endforeach;?>
                                    </ul>
                                </li>
                            <?php else:?>
                                <li><?php echo CHtml::link($menu['label'], $menu['url']);?></li>
                            <?php endif;?>
                        <?php endforeach;?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
