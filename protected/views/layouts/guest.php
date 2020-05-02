<?php /* @var $this Controller */ ?>
<?php /* @var $content */ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta name="description" content="Build Dreams Business Template" />
<meta name="keywords" content="hotels,resturent,tour & travels,Real estate,responsive,agency" />
<meta name="author" content="Logicsforest" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>

<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/css/animate.min.css">
<link rel="stylesheet" type="text/css" href="/css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="/css/range-Slider.min.css">
<link rel="stylesheet" type="text/css" href="/css/guest/style.css?<?=time();?>">
<link rel="stylesheet" type="text/css" href="/css/guest/responsive.css">
<link rel="stylesheet" type="text/css" href="/css/guest/jPushMenu.css">

<link rel="stylesheet" type="text/css" href="/css/style.css?<?=time();?>">
<link rel="shortcut icon" href="/images/heading-icon.png">
<link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
</head>
<body>

<?php $this->renderPartial('//layouts/guest/_menu');?>

<?php $this->widget('bootstrap.widgets.TbAlert', array()); ?>
<?php echo $content; ?>

<script src="/js/jquery-2.2.3.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/wow.min.js"></script>
<script src="/js/modernizr-2.8.3.min.js"></script>
<script src="/js/range-Slider.min.js"></script>
<script src="/js/selectbox-0.2.min.js"></script>
<script src="/js/select2.min.js"></script>
<script src="/js/jPushMenu.js"></script>
<script src="/js/jquery.scrollUp.min.js"></script>
<script src="/js/custom-js.js"></script>
</body>
</html>
