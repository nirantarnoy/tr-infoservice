<?php
namespace backend\components;

use yii\base\Widget;

class Footer extends Widget {
	public function run() {
		echo $this->render('footer');
	}	
}