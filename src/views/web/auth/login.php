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
                
                <?= $form->field($model, 'username', ['options'=>['style'=>'margin-right:10px; margin-left:10px;']])->textInput(['autofocus' => true, 'class' => 'form-control form-control-lg', 'placeholder' => Module::t('Username')]) ?>
                <?= '<div class = "clearfix" style = "margin-top:2px;"></div>' .$form->field($model, 'password', ['options'=>['style'=>'margin-right:10px; margin-left:10px;']])->passwordInput(['class' => 'form-control form-control-lg', 'placeholder' => Module::t('Password')]) ?>
                
                <div class="row" style="margin-right: 10px; margin-left:10px;">
                    <div class="col-5">
                    <?= Html::a(Module::t('Forgot Password!'), ['/site/auth/request-password-reset'], ['style' => 'margin-left: -10px']) ?>
                    </div>
                    <div class="col-1">

                    </div>
                    <div class="col-1">

                    </div>
                    <div class="col-5">
                    <?= 
                        $form->field($model, 'rememberMe', ['options' => ['style' => 'margin-top:0px;']])->checkbox([
                            'template' => "<div style='margin-left:24px;'>\n{input} {label}\n</div>",
                        ])->label(Module::t('Remember Me'),['style' => 'margin-top: 0px;']) ?>
                    </div>
                </div>
                <div class="d-grid" style="margin-left:10px; margin-right:10px;">
                    <?= '<div class = "clearfix"></div>' .Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

</div>
