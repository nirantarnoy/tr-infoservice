<?php
use yii\helpers\Html;


$baseUrl = Yii::getAlias('@web');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl?>/assets/theme/skin/default_skin/css/theme.css">
    <!-- -------------- CSS - allcp forms -------------- -->
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl?>/assets/theme/allcp/forms/css/forms.css">
    <link rel="stylesheet" type="text/css"  href="<?php echo $baseUrl?>/assets/theme/js/plugins/highlight/styles/github.css">
    <script>
    	window.AppUrl = "<?php echo$baseUrl;?>";
    </script>
    <?php $this->head() ?>
</head>
<body class="utility-page sb-l-c sb-r-c">
<?php $this->beginBody() ?>

<?php echo $content?>


<!-- -------------- jQuery -------------- -->
<script src="<?php echo $baseUrl?>/assets/theme/js/jquery/jquery-1.11.3.min.js"></script>
<script src="<?php echo $baseUrl?>/assets/theme/js/jquery/jquery_ui/jquery-ui.min.js"></script>

<!-- -------------- CanvasBG JS -------------- -->
<script src="<?php echo $baseUrl?>/assets/theme/js/plugins/canvasbg/canvasbg.js"></script>

<!-- -------------- Theme Scripts -------------- -->
<script src="<?php echo $baseUrl?>/assets/theme/js/plugins/highlight/highlight.pack.js"></script>
<script src="<?php echo $baseUrl?>/assets/theme/js/utility/utility.js"></script>
<script src="<?php echo $baseUrl?>/assets/theme/js/main.js"></script>

<!-- -------------- Page JS -------------- -->
<script type="text/javascript">
    jQuery(document).ready(function () {
        "use strict";
        // Init Theme Core
        Core.init();
        // Init CanvasBG
        CanvasBG.init({
            Loc: {
                x: window.innerWidth / 5,
                y: window.innerHeight / 10
            }
        });

    });
</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
