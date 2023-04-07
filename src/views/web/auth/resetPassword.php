<?php

use yii\helpers\Html;
use portalium\theme\widgets\ActiveForm;
use portalium\site\Module;

$this->title = Module::t('Reset password');
?>
<div class="site-reset-password">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h1 class="h3 mb-3 fw-normal text-center"><?= Html::encode($this->title) ?></h1>

                    <?php $form = ActiveForm::begin([
                        'id' => 'reset-password-form',
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
                    
                    <?= $form->field($model, 'password', ['options'=>['style'=>'margin-right:10px; margin-left:10px;']])->passwordInput(['autofocus' => true, 'class' => 'form-control form-control-lg', 'placeholder' => Module::t('Email')]) ?>
                    <div class="d-grid" style="margin-left:10px; margin-right:10px;">
                        <?= '<div class = "clearfix"></div>' .Html::submitButton('Send', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
