<?php
/**
 * @var $this \yii\base\View
 * @var $context \module\design\menu\RightMenu
 */
$context = $this->context;
?>

<!-- Header Start -->
<header id="main-navigation">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <?php if ($context->logo):?> <a class="navbar-brand logo-space" href="/"><img src="<?=$context->logo;?>" alt="logo" class="img-responsive"></a><?php endif;?>
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right">
            <?php if ($context->sub_logo):?>
            <a href="/" class="push_nav_brand"><img src="<?=$context->sub_logo;?>" alt="logo" class="img-responsive"></a>
            <?php endif;?>
            <?php if($context->menu):?>
            <ul class="push_nav">
                <?php foreach($context->menu as $item):?>
                <?php if (isset($item['items'])):?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" href="#" class="dropdown-toggle"><?=$item['label'];?></a>
                        <ul class="dropdown-menu">
                            <?php foreach ($item['items'] as $subItem):?>
                                <li><?=\yii\helpers\Html::a($subItem['label'],$subItem['url']);?></li>
                            <?php endforeach;?>
                        </ul>
                    </li>

                <?php else : ?>
                    <li><?=\yii\helpers\Html::a($item['label'],$item['url']);?></li>
                <?php endif;?>
                <?php endforeach;;?>
            </ul>
            <?php endif;?>
          <?=$context->content;?>
          <?php if($context->socials):?>
              <ul class="social-link">
                  <?php foreach ($context->socials as $social):?>
                  <li><?=\yii\helpers\Html::a('<i class="fa fa-'.$social['name'].'"></i><span></span>', $social['url'],['class'=>"text-center"]);?></li>
                  <?php endforeach;;?>
              </ul>
          <?php endif;?>
          <?php if ($context->button):?>
          <div class="booking"> <?=\yii\helpers\Html::a($context->button['label'],$context->button['url'],$context->button['htmlOptions']??['class'=>'button btn btn-primary btn-lg'] );?></div>
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
