<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use backend\components\SidebarRight;
use backend\components\Footer;
use backend\components\Header;
use backend\components\Sidebar;
use backend\components\Topbar;

$baseUrl = \Yii::getAlias('@web');
//AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl?>/assets/theme/fonts/icomoon/icomoon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl?>/assets/theme/js/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl?>/assets/theme/js/plugins/magnific/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl?>/assets/theme/js/plugins/c3charts/c3.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl?>/assets/theme/skin/default_skin/css/theme.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl?>/assets/theme/allcp/forms/css/forms.css">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div id="main">
<?= Header::widget()?>
<?= Sidebar::widget()?>
<section id="content_wrapper">
	<?= Topbar::widget()?>
	<section id="content" class="table-layout animated fadeIn">
	<?= $content?>
	</section>
<?= Footer::widget()?>
</section>
<?= SidebarRight::widget()?>
</div>
<script src="<?php echo $baseUrl?>/assets/theme/js/jquery/jquery-1.11.3.min.js"></script>
<script src="<?php echo $baseUrl?>/assets/theme/js/jquery/jquery_ui/jquery-ui.min.js"></script>
<!-- <script src="<?php echo $baseUrl?>/assets/theme/js/plugins/highcharts/highcharts.js"></script> -->
<script src="<?php echo $baseUrl?>/assets/theme/js/plugins/c3charts/d3.min.js"></script>
<script src="<?php echo $baseUrl?>/assets/theme/js/plugins/c3charts/c3.min.js"></script>
<script src="<?php echo $baseUrl?>/assets/theme/js/plugins/circles/circles.js"></script>
<script src="<?php echo $baseUrl?>/assets/theme/js/plugins/jvectormap/jquery.jvectormap.min.js"></script>
<script src="<?php echo $baseUrl?>/assets/theme/js/plugins/jvectormap/assets/jquery-jvectormap-us-lcc-en.js"></script>
<!-- <script src="<?php echo $baseUrl?>/assets/theme/js/plugins/fullcalendar/fullcalendar.min.js"></script> -->
<script src="<?php echo $baseUrl?>/assets/theme/allcp/forms/js/jquery-ui-monthpicker.min.js""></script>
<script src="<?php echo $baseUrl?>/assets/theme/allcp/forms/js/jquery-ui-datepicker.min.js"></script>
<script src="<?php echo $baseUrl?>/assets/theme/js/plugins/magnific/jquery.magnific-popup.js"></script>
<script src="<?php echo $baseUrl?>/assets/theme/js/utility/utility.js"></script>
<script src="<?php echo $baseUrl?>/assets/theme/js/demo/demo.js"></script>
<script src="<?php echo $baseUrl?>/assets/theme/js/main.js"></script>
<script src="<?php echo $baseUrl?>/assets/theme/js/demo/widgets.js"></script>
<!-- <script src="<?php echo $baseUrl?>/assets/theme/js/demo/widgets_sidebar.js"></script> -->
<!-- <script src="<?php echo $baseUrl?>/assets/theme/js/pages/dashboard1.js"></script> -->

<script type="text/javascript">
    jQuery(document).ready(function () {
    	Core.init();
    	Demo.init();        
    });
</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
