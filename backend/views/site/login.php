<?php 
$baseUri = \Yii::getAlias('@web');
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$str = <<<EOT
EOT;
$this->registerJs($str);
?>
<div id="main" class="animated fadeIn">
    <!-- -------------- Main Wrapper -------------- -->
    <section id="content_wrapper">
        <div id="canvas-wrapper">
            <canvas id="demo-canvas"></canvas>
        </div>
        <!-- -------------- Content -------------- -->
        <section id="content">
            <!-- -------------- Login Form -------------- -->
            <div class="allcp-form theme-primary mw320" id="login">
                <div class="text-center mb20"><img src="<?php echo $baseUri?>/assets/theme/img/logo_login_form.png" class="img-responsive"    alt="Logo"/></div>
                <div class="panel mw320">

                      <?php $form = ActiveForm::begin(['id' => 'form-login']); ?>
                        <div class="panel-body pn mv10">

                            <div class="section">
                                <label for="username" class="field prepend-icon">
                                    <?= Html::activeInput('text', $model, 'username', ['id'=>'username','class' => 'gui-input','placeholder' => 'Username']);?>
                                    <label for="username" class="field-icon">
                                        <i class="fa fa-user"></i>
                                    </label>
                                </label>
                            </div>
                            <!-- -------------- /section -------------- -->

                            <div class="section">
                                <label for="password" class="field prepend-icon">
                                    <?= Html::activeInput('password', $model, 'password', ['id'=>'password','class' => 'gui-input','placeholder' => 'Password']);?>
                                    <label for="password" class="field-icon">
                                        <i class="fa fa-lock"></i>
                                    </label>
                                </label>
                            </div>
                            <!-- -------------- /section -------------- -->

                            <div class="section">
                                <div class="bs-component pull-left pt5">
                                    <div class="radio-custom radio-primary mb5 lh25">
                                        <input type="radio" id="remember" name="remember">
                                        <label for="remember">Remember me</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-bordered btn-primary pull-right">Log in</button>
                            </div>
                            <!-- -------------- /section -------------- -->
                        </div>
                        <!-- -------------- /Form -------------- -->
                    <?php ActiveForm::end(); ?>
                </div>
                <!-- -------------- /Panel -------------- -->
            </div>
            <!-- -------------- /Spec Form -------------- -->
        </section>
        <!-- -------------- /Content -------------- -->
    </section>
    <!-- -------------- /Main Wrapper -------------- -->
</div>