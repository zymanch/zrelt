<?php /* @var $this Controller */ ?>

<header id="main-navigation">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <a class="navbar-brand logo-space" href="/"><img src="/images/logo2.png" alt="logo" class="img-responsive"><?=Yii::app()->name;?></a>
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right"> <a href="/" class="push_nav_brand"><img src="/images/logo.png" alt="logo" class="img-responsive"></a>
          <ul class="push_nav">
            <?php foreach ($this->menu as $menu):?>
                <?php if (isset($menu['items'])):?>
                    <li class="dropdown"> <a data-toggle="dropdown" href="#" class="dropdown-toggle"><?=$menu['label'];?></a>
                        <ul class="dropdown-menu">
                            <?php foreach ($menu['items'] as $subMenu):?>
                                <?php echo CHtml::link($subMenu['label'], $subMenu['url']);?>
                            <?php endforeach;?>
                        </ul>
                    </li>
                  <?php else:?>
                    <li><?php echo CHtml::link($menu['label'], $menu['url']);?></li>
                  <?php endif;?>
            <?php endforeach;?>
          </ul>
          
          <ul class="social-link">
            <li><a href="#" class="text-center"><i class="fa fa-facebook"></i><span></span></a></li>
            <li><a href="#" class="text-center"><i class="fa fa-twitter"></i><span></span></a></li>
            <li><a href="#" class="text-center"><i class="fa fa-dribbble"></i><span></span></a></li>
            <li><a href="#" class="text-center"><i class="fa fa-flickr"></i><span></span></a></li>
          </ul>
          <?php if (Yii::app()->user->isGuest):?>
          <div class="booking"> <a class="button btn btn-primary btn-lg" href="/site/login"> <i class="fa fa-sign-in"></i>Вход </a> </div>
          <div class="booking"> <a class="button btn btn-primary btn-lg" href="/sitee/regiter"> <i class="fa fa-plus-circle"></i>Регистрация </a> </div>
          <?php else:?>
          <div class="booking"> <a class="button btn btn-primary btn-lg" href="/site/logout"> <i class="fa fa-sign-in"></i>Выход </a> </div>
          <?php endif;?>
          
        </nav>
      </div>
    </div>
  </div>
</header>
<div class="container-fluid">
  <div class="main-button right">
    <button class="toggle-menu menu-right push-body"> <span></span> <span></span> <span></span> </button>
  </div>
</div>
