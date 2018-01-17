<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Requests;
use kartik\dialog\Dialog;

class RequestController extends Controller
{
	
	
    public function actionEdit()
    {
    	$identity = \Yii::$app->user->getIdentity();
    	$id = Yii::$app->request->post('id');
    	if(empty($id)){
    		$id = Yii::$app->request->get('id');
    	}
    	//query
    	$model = Requests::find()->where(['id'=>$id])->one();
    	if(empty($model)){
    			$model = new Requests();
    			$model->createBy = $identity->id;
    			$model->createTime = date('Y-m-d H:i:s',time());
    	}
    	if(\Yii::$app->request->post()){

    		$reqstModel = Yii::$app->request->post('Requests');
    		$model->setAttributes($reqstModel, false);
    		$model->requestTypeList = json_encode(Yii::$app->request->post('requestTypeList'));
    		$model->lastUpdateBy = $identity->id;
    		$model->lastUpdateTime = date('Y-m-d H:i:s',time());
    		
    		if($model->save()){
    			return $this->redirect(['request/list','id'=>$model->id]);
    		}else{
    			var_dump($model->getErrors());exit;
    		}
    	}
    	// if ($model->validate()) {  
    	// 	// all inputs are valid
    		
    	// } else {
    	// 	// validation failed: $errors is an array containing error messages
    	// 	$errors = $model->errors;
    	// }
        return $this->render('edit',['model'
        		=>$model
        ]);
    }
    
   
    public function actionList()
    {
        $sdate = '';
        $ndate = '';
        $searctext = '%%';

        if(Yii::$app->request->isGet){
           $sdate = Yii::$app->request->get('from_date');
           $ndate = Yii::$app->request->get('to_date');
           $searctext = Yii::$app->request->get('searchName');
        }

    	// $requests = \Yii::$app->request;
    	// $searchName = $requests->post('searchName', "");
    	// $createTime = $requests->post('createTime',"");

   
    	
    	$query = Requests::find();
    	
    	$arrCondition = [];
 		$arrTime = [];
 		
 		
 		if ($sdate !='' && $ndate !='' && $searctext !=''){
 			$query->where(['between','createTime', $sdate, $ndate ])
                  ->andFilterWhere(['like','firstname',$searctext]);
 			
 		}elseif ($sdate =='' && $ndate =='' && $searctext !=''){
            $query->where(['like','firstname',$searctext]);
        }

    
     	$model = $query->all();
     	
     
    
     	
     
     	
    	return $this->render('list',[
    			'model'=>$model,
    			'searchName'=> $searctext,
                'sdate' => $sdate,
                'ndate' => $ndate,
    			
    	]);
    }

  
    


    public function actionDelete($id)
    {
    	
    	$model = Requests::findOne($id);
    
    	 
    	// $id not found in database
    	if($model === null)
    		
    		throw new NotFoundHttpException('The requested page does not exist.');
    		 
    		// delete record

    		
    		$model->delete();
    		
    		 
    		return $this->redirect(['list']);
    }
  
    
    }

    
    


