<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use portalium\site\Module;

$this->title = Module::t('Login');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>
    <p><?= Module::t('Please fill out the following fields to login:') ?></p>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                <div class="form-group">
                    <?= Html::submitButton(Module::t('Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            <a class="nav-link text-uppercase font-weight-medium"
            href = '/site/auth/request-password-reset'><?= Module::t('Reset Password') ?></a>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>