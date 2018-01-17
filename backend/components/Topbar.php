<?php
namespace backend\components;

use yii\base\Widget;

class Topbar extends Widget {
	public function run() {
		echo $this->render('topbar');
	}	
}