<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;
use portalium\site\Module;
use yii\widgets\ActiveForm;
use portalium\site\models\Setting;
use portalium\site\helpers\ActiveForm as SettingForm;

$this->title = Module::t('Settings');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(['action' => Url::to(['setting/update']), 'id' => 'setting-update', 'method' => 'post', 'class' => 'form-horizontal']); ?>
<?php foreach ($settings as $index => $setting) : ?>
<div class="form-group">
    <label class="control-label col-sm-2" for="title"><?= Module::settingT($setting->category, $setting->label) ?>:</label>
    <div class="col-sm-10">
        <?= SettingForm::field($form, $setting, $index); ?>
    </div>
</div>
<?php endforeach; ?>
<div class="form-group">
    <?= Html::submitButton(Module::t('Save'), ['class' => 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>
