<?php
use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use common\models\Requests;



$baseUri = Yii::getAlias ( '@web' );
$rtl = !empty($model->requestTypeList)?$model->requestTypeList:'[]';
$str = <<<EOT
	
	var valArr = $rtl;
	$('#multiselect2').multiselect('select', valArr);
	$('#multiselect2').multiselect({
            includeSelectAllOption: true
      });
			
	$('#multiselect1').multiselect({
		 buttonClass: 'multiselect dropdown-toggle btn btn-default'	
	});
	
	$('#fileAmount').change(function(){
		var type = $("select#multiselect11 option:selected").val();
		var rate = 0;
		alert(type);
		if(type ==1){
			rate = 50;
		}else{
			rate = 20;
		}
		$('#fileServiceCharge').val($(this).val() * rate);
		cal();
	});
	$('#copyChargeAmount').change(function(){
		var type = $("select#multiselect11 option:selected").val();
		var rate = 0;
		//alert(type);
		if(type ==1){
			rate = 10;
		}else{
			rate = 5;
		}
		$('#copyCharge').val($(this).val() * rate);
		cal();
	});
	$('#pic46Amount').change(function(){
		var type = $("select#multiselect11 option:selected").val();
		var rate = 0;
		//alert(type);
		if(type ==1){
			rate = 50;
		}else{
			rate = 20;
		}
		$('#pic46price').val($(this).val() * 200);
		cal();
	});
	$('#pic57Amount').change(function(){
		var type = $("select#multiselect11 option:selected").val();
		var rate = 0;
		//alert(type);
		if(type ==1){
			rate = 50;
		}else{
			rate = 20;
		}
		$('#pic57price').val($(this).val() * 500);
		cal();
	});
	$('#pic68Amount').change(function(){
		var type = $("select#multiselect11 option:selected").val();
		var rate = 0;
		//alert(type);
		if(type ==1){
			rate = 50;
		}else{
			rate = 20;
		}
		$('#pic68price').val($(this).val() * 1000);
		cal();
	});

   function cal(){
   	  var sum1 = parseFloat($('#fileServiceCharge').val());
   	  var sum2 = parseFloat($('#copyCharge').val());
   	  var sum3 = parseFloat($('#pic46price').val());
   	  var sum4 = parseFloat($('#pic57price').val());
   	  var sum5 = parseFloat($('#pic68price').val());
   	  $('#total').val(sum1 + sum2 + sum3 +sum4 + sum5);
   }
EOT;

$this->registerJs ( $str );
$css = <<<EOT
.table-borderless > tbody > tr > td,
.table-borderless > tbody > tr > th,
.table-borderless > tfoot > tr > td,
.table-borderless > tfoot > tr > th,
.table-borderless > thead > tr > td,
.table-borderless > thead > tr > th {
    border: none;
}
EOT;
$this->registerCss ( $css );
?>

<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading">
				<h2 class="panel-title">แบบบันทึกการขอรับบริการศูนย์ข้อมูล
					หนังสือพิมพ์ไทยรัฐ</h2>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
						<p class="pull-right">วันที่ <?php echo date('d/m/Y')?> เวลา <?php echo date('H:i')?> น.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<p class="pull-right">เรียน หัวหน้าศูนย์ข้อมูล หนังสือพิมพ์ไทยรัฐ</p>
					</div>
				</div>
				<h5>ข้าพเจ้า</h5>
				<?php ActiveForm::begin(['method'=>'post',
						'options'=>[
							'class'=>'form-horizontal'
						]						
				]);?>
					
					<div class="form-group">
						<label for="" class="col-md-3 control-label">คำหน้าชื่อ<font size="3" color="#FF0000">*</font> </label>
						
						<div class="col-md-8">
							<?= Html::activeDropDownList($model, 'titleName', [1=>'นาย',2=>'นางสาว'],['id'=>'multiselect1'])?>
							
						</div>
					</div>
					<div class="form-group">
				
						<label for="" class="col-md-3 control-label">ชื่อจริง<font size="3" color="#FF0000" >*</font></label>
						<div class="col-md-2">
							<?= Html::activeInput('text', $model, 'firstname',['class'=>'form-control'])?>
						</div>
						<label for="" class="col-md-1 control-label">นามสกุล<font size="3" color="#FF0000">*</font></label>
						<div class="col-md-2">
							<?= Html::activeInput('text', $model, 'lastname',['class'=>'form-control'])?>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-md-3 control-label">แผนก<font size="3" color="#FF0000">*</font></label>
						<div class="col-md-5">
							<?= Html::activeInput('text', $model, 'department',['class'=>'form-control'])?>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-md-3 control-label">หน่วยงาน/สถานที่ติดต่อ<font size="3" color="#FF0000">*</font></label>
						<div class="col-md-5">
							<?= Html::activeInput('text', $model, 'location',['class'=>'form-control'])?>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-md-3 control-label">โทร<font size="3" color="#FF0000">*</font></label>
						<div class="col-md-5">
							<?= Html::activeInput('text', $model, 'tel',['class'=>'form-control'])?>
						</div>
					</div>
					<hr>
					<h5>มีความประสงค์ขอข้อมูล</h5>
					<div class="form-group">
						<label for="multiselect2" class="col-md-3 control-label">ประเภทงาน</label>
						<div class="col-md-5">
					
						
							<?= Html::dropDownList('requestTypeList','',Requests::$requestTypeList,['id'=>'multiselect2','multiple'=>"multiple"])?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">รายละเอียด</label>
						<div class="col-md-5">
								<?= Html::activeTextarea($model,'detail',['class'=>'form-control','rows'=>3])?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">เพื่อ</label>
						<div class="col-md-5">
								<?= Html::activeTextarea($model,'for',['class'=>'form-control'])?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">ต้นฉบับ</label>
						<div class="col-md-2">
								<?= Html::activeInput('number', $model, 'originAmount',['class'=>'form-control','min'=>0])?>
								<code>แผ่น</code>
						</div>
						<label class="col-md-1 control-label">ถ่ายเอกสาร</label>&nbsp;&nbsp;
						<div class="col-md-2">
								<?= Html::activeInput('number', $model, 'copyAmount',['class'=>'form-control','min'=>0])?>
								<code>แผ่น/หน้า</code>
						</div>
					</div>
					<hr>
					<div class="form-group">
					<label for="" class="col-md-2 control-label">ประเภทผู้ใช้</label>
						<div class="col-md-8">
							<?= Html::activeDropDownList($model, 'titleName', [1=>'บุคลธรรมดา',2=>'นักศึกษา'],['id'=>'multiselect11'])?>
						</div>
						<br /><br /> 
 
						<label class="col-md-3 control-label">ค่าเปิดแฟ้ม (@20,50) </label>
						  	<div class="col-md-2">
								<?= Html::activeInput('number', $model, 'fileAmount',['class'=>'form-control','min'=>0,'id'=>'fileAmount'])?>
								<code>แฟ้ม</code>
						</div>
						<div class="col-md-2 col-md-offset-1">
								<?= Html::activeInput('text', $model, 'fileServiceCharge',['class'=>'form-control','id'=>'fileServiceCharge'])?>
								<code>บาท</code>
						</div>
					</div>
					<div class="form-group">  
						 <label class="col-md-3 control-label">ค่าถ่ายเอกสาร (@5,10)</label>
						
						<div class="col-md-2 col-m-offset-1">
								<?= Html::activeInput('number', $model, 'copyChargeAmount',['class'=>'form-control','min'=>0,'id'=>'copyChargeAmount'])?>
								<code>แผ่น</code>
						</div>
						<div class="col-md-2 col-md-offset-1">
								<?= Html::activeInput('text', $model, 'copyCharge',['class'=>'form-control','id'=>'copyCharge'])?>
								<code>บาท</code>
						</div>
					</div>
					<hr>
					<div class="form-group">
						<label class="col-md-3 control-label">ภาพขนาด 4" x 6" ราคาภาพละ 200 บาท จำนวน</label>
						<div class="col-md-2">
								<?= Html::activeInput('number', $model, 'pic46Amount',['class'=>'form-control','min'=>0,'id'=>'pic46Amount'])?>
								<code>ภาพ</code>
						</div>
						<div class="col-md-2 col-md-offset-1">
								<?= Html::activeInput('text', $model, 'pic46Price',['class'=>'form-control','id'=>'pic46price'])?>
								<code>บาท</code>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">ภาพขนาด 5" x 7" ราคาภาพละ 500 บาท จำนวน</label>
						<div class="col-md-2">
								<?= Html::activeInput('number', $model, 'pic57Amount',['class'=>'form-control','min'=>0,'id'=>'pic57Amount'])?>
								<code>ภาพ</code>
						</div>
						<div class="col-md-2 col-md-offset-1">
								<?= Html::activeInput('text', $model, 'pic57Price',['class'=>'form-control','id'=>'pic57price'])?>

								<code>บาท</code>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">ภาพขนาด 6" x 8" ราคาภาพละ1000 บาท จำนวน</label>
						<div class="col-md-2">
								<?= Html::activeInput('number', $model, 'pic68Amount',['class'=>'form-control','min'=>0,'id'=>'pic68Amount'])?>
								<code>ภาพ</code>
						</div>
						<div class="col-md-2 col-md-offset-1">
								<?= Html::activeInput('text', $model, 'pic68Price',['class'=>'form-control','id'=>'pic68price'])?>
								<code>บาท</code>
						</div>
					</div>
					<hr>
					<div class="form-group">
						<label class="col-md-3 col-md-offset-3 control-label">รวมเป็นเงิน</label>
						<div class="col-md-2">
								<?= Html::activeInput('text', $model, 'total',['class'=>'form-control','id'=>'total'])?>
								<code>บาท</code>
						</div>
					</div>
					<div class="panel-footer text-right">
							
						 <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::resetButton('ยกเลิก', ['class' => 'reset btn btn-danger']) ?>
					</div>
					<?
					echo $_GET["numberID"]."<br>"; 
					echo $_POST["serName"]; 		?>	
<!-- 					<hr> -->
					
<!-- 					<h5 class="text-center">***** การยืมแฟ้มข่าวและเอกสารข้อมูล ต้องส่งคืนศูนย์ข้อมูลภายใน 3 วัน *****</h5> -->
<!-- 					<hr> -->
<!-- 					<h5>เฉพาะเจ้าหน้าที่ศูนย์ข้อมูล</h5> -->
<!-- 					<table class="table table-borderless""> -->
<!-- 						<tr> -->
<!-- 							<td>ลงชื่อ................................ผู้รับงาน</td> -->
<!-- 							<td>ลงชื่อ................................ผู้รับผิดชอบ</td> -->
<!-- 							<td>ลงชื่อ................................ผู้ขอใช้บริการ/ผู้ยืม</td> -->
<!-- 						</tr> -->
<!-- 						<tr> -->
<!-- 							<td>ลงชื่อ................................ผู้ส่งงาน</td> -->
<!-- 							<td colspan="2">ลงชื่อ................................ผู้อนุมัติ (หัวหน้าศูนย์ข้อมูล)</td> -->
<!-- 						</tr> -->
<!-- 					</table> -->

				<?php ActiveForm::end()?>
			</div>
		</div>
	</div>
</div>
