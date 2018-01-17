<?php
namespace backend\components;

use yii\base\Widget;
use backend\controllers\ConfigController;

class Sidebar extends Widget {
	public function run() {
		$identity = \Yii::$app->user->getIdentity();
		$arrMenu = [];
	
		//default
		foreach (ConfigController::getConfig() as $menu){
			$can = false;
			foreach($menu['authen'] as $authen){
				if(\yii::$app->user->can($authen)){
					$can = true;
					break;
				}
			}
			if($can){
				$arrMenu[] = $menu;
			}
		}
		echo $this->render('sidebar',[
				'arrMenu'=>$arrMenu
		]);
	}	
}