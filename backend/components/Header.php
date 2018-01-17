<?php
namespace backend\components;

use yii\base\Widget;

class Header extends Widget {
	public function run() {
		echo $this->render('header');
	}	
}