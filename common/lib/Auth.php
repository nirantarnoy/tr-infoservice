<?php
namespace common\lib;
use \Yii;

class Auth {
	//role ตำแหน่ง
	const ADMIN = 'role.admin';
	const USER = 'role.user';


	
	//perm สิทธิ์ การกระทำ
	const ALL = 'all';

	
	private $arrPerm = [
			self::ALL=>'ทุกอย่าง',
	];

	public static $arrUserRole = [
			self::ADMIN => 'Admin',	
			self::USER => 'User',
	];

	private $arrRolePerm = [
			self::ADMIN => [
					self::ALL
			],			
			self::USER => [
					self::ALL
			],
	];

	public function init() {
		$auth = Yii::$app->authManager;
		$auth->removeAll();
		foreach($this->arrPerm as $permName => $title) {
			$perm = $auth->createPermission($permName);
			$perm->description = $title;
			$auth->add($perm);
		}

		foreach(self::$arrUserRole as $roleName => $title) {
			$role = $auth->createRole($roleName);
			$role->description = $title;
			$auth->add($role);

			// assign role permission
			foreach($this->arrRolePerm[$roleName] as $permName) {
				$perm = $auth->getPermission($permName);
				$auth->addChild($role, $perm);
			}
		}
	}
}