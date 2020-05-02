<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 15.03.2020
 * Time: 8:35
 * @var $this \yii\web\View
 * @var $context \module\design\section\GalleryMasonry
 */
$context = $this->context;
$context->registerJsFile('isotope.pkgd.min.js');
$context->registerJsFile('masonry.js');
$categories = $context->getCategories();
$averageWidth = $context->getAverageWidth();
$averageHeight = $context->getAverageHeight();
?>
<section id="gallery-masonry">
    <div class="container">
        <div class="row">
            <div class="isotope-filters">
                <button data-filter="" class="active">Все*</button>
                <?php foreach ($categories as $index => $category):?>
                <button data-filter=".cat-<?=$index;?>"><?=$category;?></button>
                <?php endforeach;?>
            </div>
            <!-- /.portfolioFilter -->

            <div class="isotope">
                <?php foreach ($context->items as $item):?>
                <div class="item
                    <?php if($item['width']>$averageWidth):?>width2<?php endif;?>
                    <?php if($item['height']>$averageHeight):?>height2<?php endif;?>
                    <?php foreach ($item['category']??[] as $cat):?>
                    cat-<?=array_search($cat, $categories);?>
                    <?php endforeach;?>
                ">
                    <div class="media"><img src="<?=$this->context->getImageUrl($item['image']);?>" alt="image" class="img-responsive"/>
                        <div class="media__body">
                            <h2><?=$item['title'];?></h2>
                            <p><?=$item['content'];?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</section>