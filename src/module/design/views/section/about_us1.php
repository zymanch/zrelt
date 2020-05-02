<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 15.03.2020
 * Time: 8:32
 * @var $this \yii\web\View
 * @var $context \module\design\section\AboutUs
 */
$context = $this->context;
?>
<section id="about-us">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>About Us</h2>
                <p>NIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                <h3 class="pading-20-0">We Provide Highest Quality Services</h3>
                <p>NIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
            </div>
            <div class="col-md-6"> <img src="<?=$this->context->getImageUrl('about-page.jpg');?>" alt="image" class="img-responsive"/> </div>
        </div>
    </div>
</section>