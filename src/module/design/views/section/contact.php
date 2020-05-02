<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 15.03.2020
 * Time: 8:33
 * @var $this \yii\web\View
 * @var $context \module\design\section\Contact
 */
$context = $this->context;
?>
<section id="contact">
    <div class="container">
        <!-- Main Heading Starts -->
        <div class="main-head">
            <h2 data-scroll-reveal="enter top and move 50px over 1.2s" class="MT40">
                <?=$context->title;?></h2>
        </div>
        <!-- Main Heading Ends -->
        <!-- Form & Address Blocks Starts -->
        <div class="row">
            <!-- Contact Form Starts -->
            <div data-scroll-reveal="enter left and move 50px over 1.6s" id="contact-area" class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <form id="contact-form" class="contact-form" name="contact-form" method="post" action="<?=\yii\helpers\Url::to($context->action);?>">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" required placeholder="Имя">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" required placeholder="Email">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info"><?=$context->submit;?></button>
                    </div>
                </form>
            </div>
            <!-- Contact Form Ends -->
            <!-- Contact Address Starts -->
            <div data-scroll-reveal="enter right and move 50px over 1.8s" class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <?=$context->content;?>
            </div>
            <!-- Contact Address Ends -->
        </div>
        <!-- Form & Address Blocks Ends -->
    </div>
</section>
