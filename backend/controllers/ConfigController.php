<?php

namespace backend\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use common\lib\Auth;

class ConfigController extends Controller {
	public function beforeAction($event) {
		$this->enableCsrfValidation = false;
		return parent::beforeAction ( $event );
	}
	public static function getConfig() {
		$arrMenu = [ 
				
				[ 
						'title' => 'ฟอร์มขอใช้บริการ',
						'icon' => 'fa fa-edit',
						'uri' => Url::toRoute ( [ 
								"request/edit" 
						] ),
						'sub' => [ ],
						'authen' => [ 
								Auth::ADMIN,
								Auth::USER 
						] 
				],
				[ 
						'title' => 'รายการคำขอใช้บริการ',
						'icon' => 'fa fa-list',
						'uri' => Url::toRoute ( [ 
								"request/list" 
						] ),
						'sub' => [ ],
						'authen' => [ 
								Auth::ADMIN,
								Auth::USER 
						] 
				],
				[ 
						
						'title' => 'Report',
						'icon' => 'fa fa-file',
						'uri' => '',
						'sub' => [ 
								[ 
										'title' => 'common',
										'icon' => 'fa fa-file',
										'uri' => Url::toRoute ( [ 
												"report/index" 
										] ) 
								] 
						],
						'authen' => [ 
								Auth::ADMIN,
								Auth::USER 
						] 
				],
				[ 
						'title' => 'User',
						'icon' => 'fa fa-user',
						'uri' => '',
						'sub' => [ 
								[ 
										'title' => 'เพิ่ม User',
										'icon' => 'fa fa-edit',
										'uri' => Url::toRoute ( [ 
												"user/edit" 
										] ) 
								],
								[ 
										'title' => 'รายการ User',
										'icon' => 'fa fa-list',
										'uri' => Url::toRoute ( [ 
												"user/list" 
										] ) 
								] 
						],
						'authen' => [ 
								Auth::ADMIN 
						] 
				] 
		];
		return $arrMenu;
	}
}