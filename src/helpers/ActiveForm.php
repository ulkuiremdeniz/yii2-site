<?php

namespace portalium\site\helpers;

use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use portalium\site\Module;
use portalium\site\models\Form;

class ActiveForm
{
    private static $typeMethodName= [
        Form::TYPE_INPUT => 'input',
        Form::TYPE_INPUTTEXT => 'textInput',
        Form::TYPE_INPUTPASSWORD => 'passwordInput',
        Form::TYPE_INPUTFILE => 'fileInput',
        Form::TYPE_INPUTHIDDEN => 'hiddenInput',
        Form::TYPE_TEXTAREA => 'textarea',
        Form::TYPE_CHECKBOX => 'checkbox',
        Form::TYPE_CHECKBOXLIST => 'checkboxList',
        Form::TYPE_RADIO => 'radio',
        Form::TYPE_RADIOLIST => 'radioList',
        Form::TYPE_LISTBOX => 'listBox',
        Form::TYPE_DROPDOWNLIST => 'dropdownList'
    ];

    public function configT($model)
    {
        $items = Json::decode($model->config,true);
        return (is_array($items)) ? array_map(function($item) use($model) {
            return Module::settingT($model->category, $item);
            }, $items) : $model->config;
    }

    public function field($form, $model, $index)
    {
        $method = self::getMethodName($model->type);
        if(in_array($model->type, [Form::TYPE_INPUTFILE, Form::TYPE_TEXTAREA, Form::TYPE_CHECKBOX, Form::TYPE_CHECKBOXLIST, Form::TYPE_RADIO, Form::TYPE_RADIOLIST, Form::TYPE_LISTBOX, Form::TYPE_DROPDOWNLIST]))
            return $form->field($model, "[$index]value")->$method(self::configT(self::getConfigData($model)))->label(false);

        if(in_array($model->type, [Form::TYPE_INPUTTEXT, Form::TYPE_INPUTPASSWORD, Form::TYPE_INPUTHIDDEN]))
            return $form->field($model, "[$index]value")->$method()->label(false);
        
        if(in_array($model->type, [Form::TYPE_INPUT]))
            return $form->field($model, "[$index]value")->$method($model->config)->label(false);
    }

    private function getMethodName($type)
    {
        return self::$typeMethodName[$type];
    }

    private function getConfigData($model)
    {
        $items = Json::decode($model->config,true);

        if(!isset($items['model']))
            return $model;

        $class  = $items['model']['class'];
        $data   = $class::find()->all();

        $model->config = Json::encode(ArrayHelper::map( $data,
            $items['model']['map']['key'],
            $items['model']['map']['value']
        ),true);

        return $model;
    }
}
