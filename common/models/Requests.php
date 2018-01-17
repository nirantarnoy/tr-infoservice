<?php

namespace common\models;

use Yii;
use yii\debug\models\timeline\Search;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "requests".
 *
 * @property integer $id
 * @property integer $titleName
 * @property string $firstname
 * @property string $lastname
 * @property string $department
 * @property string $location
 * @property string $tel
 * @property string $requestTypeList
 * @property string $detail
 * @property string $for
 * @property integer $originAmount
 * @property integer $copyAmount
 * @property integer $fileAmount
 * @property double $fileServiceCharge
 * @property integer $copyChargeAmount
 * @property double $copyCharge
 * @property integer $pic1Amount
 * @property double $pic1Price
 * @property integer $pic2Amount
 * @property double $pic2Price
 * @property double $total
 * @property integer $createBy
 * @property string $createTime
 * @property integer $lastUpdateBy
 * @property string $lastUpdateTime
 */
class Requests extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'requests';
    }

    /**
     * @inheritdoc
     */
  /*  public $from_date;
    public $to_date;
    
    public function behaviors()
    {
    	return [
    			[
    					'class' => Requests::className(),
    					'name' => 'createTime',
    					'startAttribute' => 'from_date',
    					'endAttribute' => 'to_date',
    			]
    	];
    } */
    
    public function rules()
    {
        return [

            [['titleName', 'originAmount', 'copyAmount', 'fileAmount', 'copyChargeAmount', 'pic46Amount', 'pic57Amount','pic68Amount', 'createBy', 'lastUpdateBy','digitalFileAmount'], 'integer'],
            [['fileServiceCharge', 'copyCharge', 'pic46Price', 'pic57Price','pic68Price','digitalFilePrice', 'total'], 'number'],

            [['createTime', 'lastUpdateTime'], 'safe'],
            [['firstname', 'lastname', 'department', 'location', 'tel', 'requestTypeList'], 'string', 'max' => 250],
            [['detail'], 'string', 'max' => 500],
            [['for'], 'string', 'max' => 300],
        	[['firstname', 'lastname', 'department', 'location','tel'], 'required'],
        		
      
        		
        	
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titleName' => 'Title Name',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'department' => 'Department',
            'location' => 'Location',
            'tel' => 'Tel',
            'requestTypeList' => 'Request Type List',
            'detail' => 'Detail',
            'for' => 'For',
            'originAmount' => 'Origin Amount',
            'copyAmount' => 'Copy Amount',
            'fileAmount' => 'File Amount',
            'fileServiceCharge' => 'File Service Charge',
            'copyChargeAmount' => 'Copy Charge Amount',
            'copyCharge' => 'Copy Charge',

        	'digitalFileAmount' => 'digitalFile Amount',
        	'digitalFilePrice' => 'digitalFile Price',

            'pic46Amount' => 'Pic46 Amount',
            'pic46Price' => 'Pic46 Price',
            'pic57Amount' => 'Pic57 Amount',
            'pic57Price' => 'Pic57 Price',
        	'pic68Amount' => 'Pic68 Amount',
        	'pic68Price' => 'Pic68 Price',
            'total' => 'Total',
            'createBy' => 'Create By',
            'createTime' => 'Create Time',
            'lastUpdateBy' => 'Last Update By',
            'lastUpdateTime' => 'Last Update Time',
        ];
    }
    
    const REQUEST_TYPE_NEWS = 1;
    const REQUEST_TYPE_FILME = 2;
    const REQUEST_TYPE_PIC = 3;
    const REQUEST_TYPE_BOOK = 4;
    const REQUEST_TYPE_HISTORY = 5;
    const REQUEST_TYPE_COLUMN = 6;
    const REQUEST_TYPE_OTHER = 7;
    
    public static $requestTypeList = [
    		self::REQUEST_TYPE_NEWS=>'ข่าว',
    		self::REQUEST_TYPE_FILME=>'ฟิล์ม',
    		self::REQUEST_TYPE_PIC=>'ภาพ',
    		self::REQUEST_TYPE_BOOK=>'หนังสือ-วารสาร',
    		self::REQUEST_TYPE_HISTORY=>'ประวัติ',
    		self::REQUEST_TYPE_COLUMN=>'คอลัมน์',
    		self::REQUEST_TYPE_OTHER=>'ข้อมูลอื่นๆ'
    		
    ];
    
    const FEE_TYPE_STUDENT = 1;
    const FEE_TYPE_PERSONAL = 2;
    
    public static $arrFeeType = [
    	self::FEE_TYPE_PERSONAL => "บุคคลทั่วไป",
    	self::FEE_TYPE_STUDENT=> "นักศึกษา",
    ];
    
   public static $arrFilePrice = [
    	self::FEE_TYPE_PERSONAL => 50,
    	self::FEE_TYPE_STUDENT=> 20
    		
    ];
    
    public static $arrCopyPrice = [
    	self::FEE_TYPE_PERSONAL => 5,
    	self::FEE_TYPE_STUDENT=> 10
    		
    ];
    
    public static $arrPhotoPrice = [
    	"photo46"=> 200,
    	"photo57"=> 500, 
    	"photo"=> 1000
    	
    ];
    public static $arrDigitalFilePrice = [
    		self ::FEE_TYPE_PERSONAL =>4000,
    		self ::FEE_TYPE_STUDENT => 4000
    		
    		
    ];
    
}




	
	
	
	
	
	
	
	
	
	
	
