<?php 
use kartik\daterange\DateRangePicker;
use kartik\widgets\DatePicker;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\grid\GridView;
use kartik\dialog\Dialog;
use yii\helpers\Url;


$baseUrl = \Yii::getAlias('@web');
?>



 <div class="container">
 <div class="row">
 <div class="col-md-10">
 <form class="form-inline" name="searchform" id="searchform" action="<?=Url::to(['request/list'],true)?>" method="get">
 <div class="form-group">
 
 <?php 
 // echo DatePicker::widget([
 // 		'name' => 'createTime',
 // 		'type' => DatePicker::TYPE_COMPONENT_APPEND,
 // 		'value' => '23-Feb-1982',
 // 		'pluginOptions' => [
 // 				'autoclose'=>true,
 // 				'format' => 'dd-M-yyyy'
 // 		]
 // ]);
 ?>
 
 
 
 <?php  
 echo '<div class="input-group drp-container">';

echo DateRangePicker::widget([
    'name'=>'createTime',
    'useWithAddon'=>true,
    'convertFormat'=>true,
	'language' => 'th',
    'startAttribute' => 'from_date',
    'endAttribute' => 'to_date',
 	'startInputOptions' => ['value' =>$sdate!=''?$sdate:date('d-m-Y')],
    'endInputOptions' => ['value' => $ndate!=''?$ndate:date('d-m-Y')],
    'pluginOptions'=>[
        'locale'=>['format' => 'd-m-Y'],
    ]
]) ;//. $addon; 


echo '</div>';
echo "  ";
//echo '<input type="text" name="itemname" id="itemname" class="form-control" placeholder="ชื่อผู้ขอรับบริการ" autocomplete="off">';
echo Html::textInput('searchName', $searchName, ["class"=>"form-control",'placeholder'=>'ชื่อผู้ขอใช้บริการ']); 
?> 
   						

 </div>
 <button type="submit" class="btn btn-primary" id="btnSearch">
 <span class="glyphicon glyphicon-search"></span>
 ค้นหา
 </button>
 </form>
 </div>
 </div>
 <div class="loading"></div>
 <div class="row" id="list-data" style="margin-top: 10px;"> 
 </div>
 
 

 
 
<div class="row">
	<div class="col-xs-12">
		<div class="panel">
			<div class="panel-heading">
				<span class="panel-title hidden-xs"> Products status</span>
			</div>
			<div class="panel-body pn">
				<div class="table-responsive">
					<table class="table allcp-form theme-warning tc-checkbox-1 fs13">
						<thead>
							<tr class="bg-light">
								<th class="text-center"></th>
								<th class="">วันที่</th>
								<th class="">ผู้ขอ</th>
								<th class="">เบอร์</th>
								<th class="">ราคา</th>
								<th class="text-right">Status</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($model as $i=>$model){?>
							<tr>
								<td class="text-center"><?php echo $i+1?></td>
								<td class=""><?php echo date('d/m/Y',strtotime($model->createTime))?></td>
								<td class=""><?php echo $model->firstname.' '.$model->lastname?></td>
								<td class=""><?php echo $model->tel ?></td>
								<td class=""><?php echo $model->total ?></td>
								<td class="text-right">
									<a class="btn btn-primary btn-xs "  href="<?php echo Url::toRoute(['edit','id'=>$model->id])?>"><i class = "glyphicon glyphicon-eye-open " ></i></a>
									<a class="btn btn-warning btn-xs" href="<?php echo Url::toRoute(['edit','id'=>$model->id])?>"><i class = "glyphicon glyphicon-edit"></i></a>
									<a class="btn btn-danger btn-xs glyphicon glyphicon-trash"
									<?php echo Dialog::widget(['overrideYiiConfirm' => true]);
											echo Html::a(
 										   '', ['delete', 'id' => $model->id], 
											    [
 										       'data-confirm' => 'Are you sure to delete this item?'
										      // 'data-method' => 'post'
 												   ]
												);?>
												</a>
								</td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>