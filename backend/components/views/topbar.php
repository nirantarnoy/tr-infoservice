<?php 

use yii\helpers\Url;

?>
        <!-- -------------- Topbar -------------- -->
        <header id="topbar" class="alt">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="breadcrumb-icon">
                        <a href="<?php echo Url::toRoute(['site/index'])?>">
                            <span class="fa fa-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-active">
                        <a href="<?php echo Url::toRoute(['site/index'])?>">Home</a>
                    </li>
                </ol>
            </div>

        </header>