<?php 
use yii\helpers\Url;
use backend\controllers\ConfigController;

$baseUrl = \Yii::getAlias('@web');
?>
<aside id="sidebar_left" class="nano nano-light affix sidebar-light">

        <!-- -------------- Sidebar Left Wrapper  -------------- -->
        <div class="sidebar-left-content nano-content">

            <!-- -------------- Sidebar Header -------------- -->
            <header class="sidebar-header">

                <!-- -------------- Sidebar - Author -------------- -->
                <div class="sidebar-widget author-widget">
                    <div class="media">
                        <a class="media-left" href="#">
                            <img src="<?php echo $baseUrl?>/assets/theme/img/avatars/profile_avatar.jpg" class="img-responsive">
                        </a>

                        <div class="media-body">
                            <div class="media-links">
                                <a href="<?php echo Url::toRoute(['user/edit'])?>" class="sidebar-menu-toggle">User Menu -</a> <a href="<?php echo Url::toRoute(['site/logout'])?>">Logout</a>
                            </div>
                            <div class="media-author"><?php echo Yii::$app->user->identity->firstName.' '.Yii::$app->user->identity->lastName?></div>
                        </div>
                    </div>
                </div>

                <!-- -------------- Sidebar - Author Menu  -------------- -->
                <div class="sidebar-widget menu-widget">
                    <div class="row text-center mbn">
                        <div class="col-xs-2 pln prn">
                            <a href="dashboard1.html" class="text-primary" data-toggle="tooltip" data-placement="top"
                               title="Dashboard">
                                <span class="fa fa-dashboard"></span>
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-2 pln prn">
                            <a href="charts-highcharts.html" class="text-info" data-toggle="tooltip"
                               data-placement="top" title="Stats">
                                <span class="fa fa-bar-chart-o"></span>
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-2 pln prn">
                            <a href="sales-stats-products.html" class="text-system" data-toggle="tooltip"
                               data-placement="top" title="Orders">
                                <span class="fa fa-info-circle"></span>
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-2 pln prn">
                            <a href="sales-stats-purchases.html" class="text-warning" data-toggle="tooltip"
                               data-placement="top" title="Invoices">
                                <span class="fa fa-file"></span>
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-2 pln prn">
                            <a href="basic-profile.html" class="text-alert" data-toggle="tooltip" data-placement="top"
                               title="Users">
                                <span class="fa fa-users"></span>
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-2 pln prn">
                            <a href="management-tools-dock.html" class="text-danger" data-toggle="tooltip"
                               data-placement="top" title="Settings">
                                <span class="fa fa-cogs"></span>
                            </a>
                        </div>
                    </div>
                </div>

            </header>
            <!-- -------------- /Sidebar Header -------------- -->

            <!-- -------------- Sidebar Menu  -------------- -->
            <ul class="nav sidebar-menu">
                <li class="sidebar-label pt30">Menu</li>
                <?php foreach($arrMenu as $menu){

                	if(empty($menu['uri'])){
                		$link = 'javascript:;';
                	}else{
                		$link = $menu['uri'];       
                	}?>
                	
                	<?php if(empty($menu['sub'])){?>
                	<li>
						<a href="<?= $link?>"><span class="<?php echo $menu['icon']?>"></span> <?= $menu['title']?></a>
                	</li>
                	 <?php }else{?>
                	 <li>
	                    <a class="accordion-toggle" href="<?php echo $link;?>">
	                        <span class="<?php echo $menu['icon']?>"></span>
	                        <span class="sidebar-title"><?= $menu['title']?></span>
	                        <span class="caret"></span>
	                    </a>
	                    <ul class="nav sub-nav">
	                    	<?php foreach($menu['sub'] as $submenu){?>
	                        <li>
	                            <a href="<?php echo $submenu['uri']?>"> <i class="<?php echo $submenu['icon']?>"></i> <?php echo $submenu['title']?> </a>
	                        </li>
	                        <?php }?>
	                    </ul>
	                </li>
	                <?php }?>
                <?php }?>        
            </ul>
            <!-- -------------- /Sidebar Menu  -------------- -->

            <!-- -------------- Sidebar Hide Button -------------- -->
            <div class="sidebar-toggler">
                <a href="javascript:;">
                    <span class="fa fa-arrow-circle-o-left"></span>
                </a>
            </div>
            <!-- -------------- /Sidebar Hide Button -------------- -->

        </div>
        <!-- -------------- /Sidebar Left Wrapper  -------------- -->

    </aside>