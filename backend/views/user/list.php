<?php
use yii\helpers\Url;
use common\lib\Workflow;
use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\LinkPager;
$baseUri = Yii::getAlias('@web');



$this->title = Yii::$app->controller->action->id;
$uri = Yii::$app->controller->getRoute();

$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => [$uri]];
?>
<!-- -------------- Column Left -------------- -->
           <!-- -------------- Column Left -------------- -->
            <aside class="chute chute-left chute290" data-chute-height="match">
				<?php $form = ActiveForm::begin(['id'=>'contentList','options' => ['method'=>'post']]);?>
                <!-- -------------- Menu Block -------------- -->
                <div class="allcp-form theme-primary">

                    <h5 class="pln"> Find Users</h5>

                    <h6 class="mb15"> by ID</h6>

                    <div class="section mb20">
                        <label for="customer-id" class="field prepend-icon">
                            <?= Html::textInput('q',$search['q'],['class'=>'gui-input','placeholder'=>'name, username'])?>
                            <label for="customer-id" class="field-icon">
                                <i class="fa fa-user"></i>
                            </label>
                        </label>
                    </div>
                    <h6 class="mb15"> by status</h6>
                    <div class="section mb20">
                        <label for="customer-name" class="field prepend-icon">
                            <?= Html::dropDownList('status',$search['status'],[''=>'ทุกสถานะ']+Workflow::$arrStatusTh,['class'=>'gui-input']);?>
                        </label>
                    </div>
                    <hr class="short">

                    <div class="section">
                        <button class="btn btn-primary pull-right ph30" type="button">Search</button>
                    </div>

                </div>
			<?= Html::hiddenInput('op','');?>
 			<?php ActiveForm::end(); ?>
            </aside>
            <!-- -------------- /Column Left -------------- -->

            <!-- -------------- Column Center -------------- -->
            <div class="chute chute-center pt30">

                <!-- -------------- Table -------------- -->
                <div class="panel">
                    <div class="panel-body pn">
                        <div class="table-responsive">
                            <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                <thead>
                                <th><div class="checkList"><i class="fa fa-check-square-o"></i></div></th>
								<th>Username</th>
								<th>FirstName</th>
								<th>LastName</th>
								<th>Status</th>						
								<th>อัพเดทล่าสุด</th>
								<th>Action</th>
                                </thead>
                                <tbody>
                              
		                         <?php foreach($contentList as $i=>$model){?>
									<tr>
										<td><?= Html::input('checkbox','selectContent[]',$model->id)?></td>
										<td>
											<a class="" href="<?= Url::toRoute(['user/edit','id'=>$model->id,'class'=>'form-control'])?>">
											<?= $model->username?>
											</a>
										</td>
										<td>
											<a class="" href="<?= Url::toRoute(['user/edit','id'=>$model->id])?>">
											<?= $model->firstName?>
											</a>
										</td>
										<td>
											<a class="" href="<?= Url::toRoute(['user/edit','id'=>$model->id])?>">
											<?= $model->lastName?>
											</a>
										</td>
										<td>
											<i class="fa <?= isset(Workflow::$arrStatusFaIcon[$model->status]['icon'])?Workflow::$arrStatusFaIcon[$model->status]['icon']:''?>" 
												title="<?= isset(Workflow::$arrStatusTh[$model->status])?Workflow::$arrStatusTh[$model->status]:''?>">
											</i>
											
										</td>
										<td><?= date('d/m/Y H:i',strtotime($model->lastUpdateTime))?></td>
										<td>
											<a class="btn btn-warning" href="<?= Url::toRoute(['user/edit','id'=>$model->id])?>"><i class="fa fa-edit"></i> Edit</a>
										</td>
									</tr>
								<?php }?>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            
