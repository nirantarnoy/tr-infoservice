<?php 
use yii\helpers\Url;

$baseUrl = \Yii::getAlias('@web');
?>
<header class="navbar navbar-fixed-top bg-system">
        <div class="navbar-logo-wrapper dark bg-system">
            <a class="navbar-logo-text" href="<?php echo Url::toRoute(['site/index']);?>">
                <b>Library Service</b>
            </a>
            <span id="sidebar_left_toggle" class="ad ad-lines"></span>
        </div>
        <ul class="nav navbar-nav navbar-left">

            <li class="hidden-xs">
                <a class="navbar-fullscreen toggle-active" href="#">
                    <span class="glyphicon glyphicon-fullscreen"></span>
                </a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown dropdown-fuse">
                <a href="#" class="dropdown-toggle fw600" data-toggle="dropdown">
                    <span class="hidden-xs"><name><?php echo Yii::$app->user->identity->firstName.' '.Yii::$app->user->identity->lastName?></name> </span>
                    <span class="fa fa-caret-down hidden-xs mr15"></span>
                    <img src="<?php echo $baseUrl?>/assets/theme/img/avatars/profile_avatar.jpg" alt="avatar" class="mw55">
                </a>
                <ul class="dropdown-menu list-group keep-dropdown w250" role="menu">
                    <li class="list-group-item">
                        <a href="<?php echo Url::toRoute(['user/edit','id'=>Yii::$app->user->identity->id])?>" class="animated animated-short fadeInUp">
                            <span class="fa fa-cogs"></span> Settings </a>
                    </li>
                    <li class="dropdown-footer text-center">
                        <a href="<?php echo Url::toRoute(['site/logout'])?>" class="btn btn-primary btn-sm btn-bordered">
                            <span class="fa fa-power-off pr5"></span> Logout </a>
                    </li>
                </ul>
            </li>
        </ul>
    </header>