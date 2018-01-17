<?php
namespace backend\components;

use yii\base\Widget;

class SidebarRight extends Widget {
	public function run() {
		echo $this->render('sidebar-right');
	}	
}