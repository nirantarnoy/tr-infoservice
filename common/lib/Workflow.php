<?php
namespace common\lib;


class Workflow {
	/*------------------------------workflow----------------------------*/
	const STATUS_REJECTED = -1;
	const STATUS_DRAFT = 2;
	const STATUS_PUBLISHED = 10;
	
	public static $arrStatus = [
			self::STATUS_REJECTED => 'Rejected',
			self::STATUS_DRAFT => 'Draft',
			self::STATUS_PUBLISHED => 'Published',
	];
	public static $arrStatusTh = array(
			self::STATUS_DRAFT=>'กำลังแก้ไข',
			self::STATUS_PUBLISHED=>'แสดงผล',
			self::STATUS_REJECTED => 'ปิด',
	);	
	public static $arrStatusIcon = array(
			self::STATUS_REJECTED => 'disable_icon.png',
			self::STATUS_DRAFT=>'edit_icon.png',
			self::STATUS_PUBLISHED=>'enable_icon.png',
	);
	
	public static $arrStatusFaIcon = array(
			self::STATUS_DRAFT=> array('icon'=>'fa-pencil-square-o', 'css'=> 'draft'),
			self::STATUS_PUBLISHED=> array('icon'=>'fa-check', 'css'=> 'published'),
			self::STATUS_REJECTED => array('icon'=>'fa-lock', 'css'=> 'delete'),
	);
	const PAGE_SIZE = 30;
}
