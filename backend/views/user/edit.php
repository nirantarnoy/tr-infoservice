<?php
use yii\bootstrap\Html;
use yii\base\View;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use common\lib\Workflow;
use common\lib\Auth;
use common\models\User;

$baseUri = Yii::getAlias('@web');
$str = <<<EOT
$('.resetPassBtn').on('click',function(){
	if(confirm('คุณต้องการ reset password ใช่หรือไม่')){
		id = $(this).data('id');
		$('input[name="op"]').val('resetpass');
		$('#contentForm').submit();
	}
	return false;
});
EOT;

$this->registerJs($str);

$str = <<<EOT

EOT;
$this->registerJs($str);
$css = <<<EOT
EOT;
$this->registerCss($css);
$this->title = $user->username;

$this->params['breadcrumbs'][] = ['label' => 'list', 'url' => ['user/list']];
$this->params['breadcrumbs'][] = ['label' => $user->username];
?>
<div class="allcp-form theme-primary">
	<div class="panel">
		<div class="panel-heading">
			<span class="panel-title">User Edit</span>
		</div>
		<!-- -------------- /Panel Heading -------------- -->

		<?php $form = ActiveForm::begin(['id'=>'contentForm']); ?>
			<div class="panel-body pn">
				<div class="form-group">
					<label for="username" class="field prepend-icon"> 
						<?= Html::activeInput('text', $user, 'username',['class'=>'form-control','placeholder'=>'Username'])?>
					 <label for="username" class="field-icon"> <i class="fa fa-user"></i>
					</label>
					</label>
				</div>
				<!-- -------------- /section -------------- -->

				<div class="form-group">
					<label for="password" class="field prepend-icon"> 
					<?= Html::textInput('password','',['class'=>'form-control','placeholder'=>'Password'])?>
					<label for="password" class="field-icon"> <i class="fa fa-envelope"></i>
					</label>
					</label>
				</div>
				<!-- -------------- /section -------------- -->

				<div class="form-group">
					<label for="firstName" class="field prepend-icon"> 
					<?= Html::activeInput('text', $user, 'firstName',['class'=>'form-control','placeholder'=>'First name'])?>
					<label for="firstName" class="field-icon"> <i class="fa fa-envelope"></i>
					</label>
					</label>
				</div>
				<!-- -------------- /section -------------- -->

				<div class="form-group">
					<label for="lastName" class="field prepend-icon"> 
					<?= Html::activeInput('text', $user, 'lastName',['class'=>'form-control','placeholder'=>'Last name'])?>
					<label for="lastName" class="field-icon"> <i class="fa fa-envelope"></i>
					</label>
					</label>
				</div>
				<!-- -------------- /section -------------- -->
				<div class="form-group">
					<div class="bs-component">
					<?php echo Html::dropDownList('User[role]',$user->role,Auth::$arrUserRole,['class'=>'form-control'])?>
					</div>
				</div>
				<div class="form-group">
					<?php echo Html::dropDownList('User[status]',$user->status,[User::STATUS_ACTIVE=>'เปิด',User::STATUS_DELETED=>'ปิด'],['class'=>'form-control'])?>
				</div>
				<div class="form-group text-right">
				
						<button type="submit" class=" btn btn-success">บันทึก</button>
						 <?= Html::resetButton('ยกเลิก', ['class' => 'reset btn btn-danger']) ?>
					</div>
				</div>
			<?= Html::hiddenInput('id',$user->id);?>
			<?= Html::hiddenInput('op','');?>
		<?php ActiveForm::end(); ?>
		<!-- -------------- /Form -------------- -->
	</div>
	<!-- -------------- /Panel -------------- -->
</div>
