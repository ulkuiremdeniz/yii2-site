<?php

use yii\helpers\Html;
use portalium\theme\widgets\ActiveForm;
use portalium\site\Module;

$this->title = Module::t('Login');
?>

<div class="site-login">
<div class="row justify-content-center">
    <div class="col-lg-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="h3 mb-3 fw-normal text-center"><?= Html::encode($this->title) ?></h1>

                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'options' => ['class' => 'form-horizontal'],
                    'fieldConfig' => [
                        'horizontalCssClasses' => [
                            'label' => 'col-sm-4',
                            'wrapper' => 'col-sm-8',
                        ],
                        'template' => "{input}\n{hint}\n{error}",
                        'labelOptions' => ['style' => 'margin-top: 10px;'],
                    ],
                ]); ?>
                
                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'form-control form-control-lg', 'placeholder' => Module::t('Username')]) ?>
                <?= '<div class = "clearfix" style = "margin-top:2px;"></div>' .$form->field($model, 'password')->passwordInput(['class' => 'form-control form-control-lg', 'placeholder' => Module::t('Password')]) ?>
                <?= Html::a(Module::t('Forgot Password!'), ['/site/auth/request-password-reset'], ['style' => 'float: right;']) ?>
                <div class = "clearfix"></div>
                <?= 
                $form->field($model, 'rememberMe', ['options' => ['style' => 'margin-top:0px; float:right;']])->checkbox([
                    'template' => "<div class=\"form-check\">\n{input} {label}\n</div>",
                ])->label(Module::t('Remember Me'),['style' => 'margin-top: 0px;']) ?>
                
                
                <div class = "clearfix"></div>
                <div style="float:right">
                    <?= '<div class = "clearfix"></div>' .Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button', 'style'=>'float:right; margin-top:0px;']) ?>
                </div>
                

                

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

</div>
