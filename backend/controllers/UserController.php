<?php
namespace backend\controllers;

use Yii;
use common\lib\Workflow;
use common\models\User;
use yii\data\Pagination;
use common\lib\Auth;
use yii\filters\AccessRule;
use yii\filters\AccessControl;
use yii\web\Controller;



class UserController extends Controller
{
	public function beforeAction($event)
	{
		$this->enableCsrfValidation = false;
		return parent::beforeAction($event);
	}
	public function behaviors()
	{

		return [
				'access'=>[
						'class'=>AccessControl::className(),
						'ruleConfig'=>[
								'class'=>AccessRule::className()
						],
						'rules'=>[
								[
										'allow'=> true,
										'roles'=>[
												Auth::ADMIN,
										]
								],
						]
				],
		];
	}
	public function actionList(){	 
		// if (Yii::$app->request->isPost) {

  //   		$op = Yii::$app->request->post('op');
  //   		$selectContent =  Yii::$app->request->post('selectContent');
  //   		if($op == 'delete'){
  //   			$r = $this->doDelete($selectContent);
  //   			if($r){
  //   				$this->reassign();
  //   				Yii::$app->session->setFlash('message.level', 'success');
  //   				Yii::$app->session->setFlash('message.content', 'ลบสำเร็จ '.$r.' รายกาย');
  //   			}else{
  //   				Yii::$app->session->setFlash('message.level', 'warning');
  //   				Yii::$app->session->setFlash('message.content', 'ลบไม่สำเร็จ');
  //   			}
  //   		}else if($op == 'search'){
  //   			$q =  Yii::$app->request->post('q');
  //   			$status =  Yii::$app->request->post('status');
    			
  //   			$query = User::find();
  //   			if($q!=null){
  //   				$query->andWhere(['like','username',$q]); 
  //   				$query->orWhere(['like','firstName',$q]); 
  //   				$query->orWhere(['like','lastName',$q]); 
  //   				$query->orWhere(['like','nickName',$q]); 
  //   				$query->orWhere(['like','role',$q]); 
  //   			}
  //   			if($status!=null){
  //   				$query->andWhere(['status'=>$status]);    	
  //   			}
    			
    			
  //   			\Yii::$app->session['user/list.query'] = $query;
  //   			\Yii::$app->session['user/list.query.q'] = $q;
  //   			\Yii::$app->session['user/list.query.status'] = $status;
    			
    			
  //   		}else if($op == 'resetSearch'){
  //   			$query = User::find();
  //   			\Yii::$app->session['user/list.query'] = $query;
  //   			\Yii::$app->session['user/list.query.q'] = '';
  //   			\Yii::$app->session['user/list.query.status'] = '';
  //   		}
  //   	}    	

        $uname = '';
        $status = 0;

        if(Yii::$app->request->isGet){
            $uname = Yii::$app->request->get('uname');
            $status = Yii::$app->request->get('status');
        }

    	// $query = isset(\Yii::$app->session['user/list.query'])?\Yii::$app->session['user/list.query']:User::find();
    	// $search['q'] = isset(\Yii::$app->session['user/list.query.q'])?\Yii::$app->session['user/list.query.q']:'';
    	// $search['status'] = isset(\Yii::$app->session['user/list.query.status'])?\Yii::$app->session['user/list.query.status']:'';

        $query = User::find();

        if($uname != ''){
            $query->where(['or',['like','firstName',$uname],['like','lastName',$uname],['like','username',$uname]]);
        }
            if($status != ''){
              $query->andFilterWhere(['=','status',$status]);
            }
    	

    	$query->orderBy('createTime');
    	$count = $query->count();
    
		$pages = new Pagination([
				'defaultPageSize' => Workflow::PAGE_SIZE,
				'totalCount' => $count,
		]);

		$models = $query
		->offset($pages->offset)
		->limit($pages->limit)
		->all();
		$contentList = $models;
		
		return $this->render('list',[
				'pages'=>$pages,
			     'uname'=>$uname,
                'status'=>$status,
            	'contentList'=>$contentList,
		]);
       // }
	}
	public function doDelete($arrId){

    	return User::deleteAll(['in','id',$arrId]);
    }
	public function reassign() {
		$appAuth = new Auth();		
		$auth = Yii::$app->authManager;
		$auth->removeAllAssignments();
		$query = User::find();
		foreach($query->all() as $model) {
			$role = $auth->getRole($model->role);
			if(!empty($role))
				$auth->assign($role, $model->id);
		}
	}
	public function actionEdit(){

    	$error=[];
    	//request
    	$id = Yii::$app->request->post('id');
		if(empty($id)){ 
			$id = Yii::$app->request->get('id');
		}
		$identity = \Yii::$app->user->getIdentity();
		
       	//query
    	$user = User::find()->where(['id'=>$id])->one();
    	if(empty($user)){
    		$user = new User();	
    	}	   	
    	   	
    	if(\Yii::$app->request->post()){
    		$op = Yii::$app->request->post('op');
	    	if($op == 'resetpass'){
	    		$password = '1234';
	    	}else{
	    		$password = Yii::$app->request->post('password');
	    	}
    		$reqstUser = Yii::$app->request->post('User');
			
    		if(empty($user->id)){
    			$user->createBy = $identity->id;
    			$user->createTime = date('Y-m-d H:i:s',time());
    			$user->lastUpdateBy = $identity->id;
    			$user->lastUpdateTime = date('Y-m-d H:i:s',time());
    		}else{
    			$user->lastUpdateBy = $identity->id;
    			$user->lastUpdateTime = date('Y-m-d H:i:s',time());
    		}
    		$user->setAttributes($reqstUser, false);
    		if($password!=null){
    			$user->setPassword($password);
    			$user->generateAuthKey();
    		}
    		if($user->save()){
    			$this->reassign();
    			Yii::$app->session->setFlash('message.level', 'success');
    			Yii::$app->session->setFlash('message.content', 'บันทึกข้อมูล');	    		
    		}else{
    			$error[]=['user'=>['id'=>$user->id]];
    			Yii::$app->session->setFlash('message.level', 'warning');
    			Yii::$app->session->setFlash('message.content', 'บันทึกไม่สำเร็จ');
    		}
    	}
		
    	return $this->render('edit',[
    			'user'=>$user,
    	]);
    }
}