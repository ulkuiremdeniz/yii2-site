<?php

namespace portalium\site\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use portalium\site\Module;
use portalium\site\models\Form;

class SettingValue extends Model
{
    public $value;

    const SCENARIO_INPUT            = 0;
    const SCENARIO_INPUTTEXT        = 1;
    const SCENARIO_INPUTPASSWORD    = 2;
    const SCENARIO_INPUTFILE        = 3;
    const SCENARIO_INPUTHIDDEN      = 4;
    const SCENARIO_TEXTAREA         = 5;
    const SCENARIO_CHECKBOX         = 6;
    const SCENARIO_CHECKBOXLIST     = 7;
    const SCENARIO_RADIO            = 8;
    const SCENARIO_RADIOLIST        = 9;
    const SCENARIO_LISTBOX          = 10;
    const SCENARIO_DROPDOWNLIST     = 11;
    const SCENARIO_WIDGET           = 12;
    public function rules()
    {
        return [
            [['value'], 'string', 'max' => 200, 'on' => self::SCENARIO_INPUT],
            [['value'], 'string', 'max' => 200, 'on' => self::SCENARIO_DEFAULT],
            [['value'], 'string', 'max' => 200,'on' => self::SCENARIO_INPUTTEXT],
            [['value'], 'string', 'max' => 200,'on' => self::SCENARIO_INPUTPASSWORD],
            [['value'], 'string', 'max' => 200,'on' => self::SCENARIO_INPUTFILE],
            [['value'], 'string', 'max' => 200,'on' => self::SCENARIO_INPUTHIDDEN],
            [['value'], 'string', 'max' => 200,'on' => self::SCENARIO_TEXTAREA],
            [['value'], 'string', 'max' => 200, 'on' => self::SCENARIO_CHECKBOX],
            [['value'], 'each', 'rule' => ['string', 'max' => 200], 'on' => self::SCENARIO_CHECKBOXLIST],
            [['value'], 'string', 'max' => 200, 'on' => self::SCENARIO_RADIO],
            [['value'], 'string', 'max' => 200, 'on' => self::SCENARIO_RADIOLIST],
            [['value'], 'each', 'rule' => ['string', 'max' => 200], 'on' => self::SCENARIO_LISTBOX],
            [['value'], 'string', 'max' => 200, 'on' => self::SCENARIO_DROPDOWNLIST],
            [['value'], 'string', 'on' => self::SCENARIO_WIDGET],
        ];
    }

    public function attributeLabels()
    {
        return [
            'value' => Module::t('Value'),
        ];
    }

    public function afterValidate()
    {
        parent::afterValidate();

        if ($this->hasErrors()) {
            $this->addError('value', Module::t('Value is invalid.'));
        }
    }

    public static function getScenarios()
    {
        return [
            'single' => [
                self::SCENARIO_INPUT,
                self::SCENARIO_INPUTTEXT,
                self::SCENARIO_INPUTPASSWORD,
                self::SCENARIO_INPUTFILE,
                self::SCENARIO_INPUTHIDDEN,
                self::SCENARIO_TEXTAREA,
                self::SCENARIO_CHECKBOX,
                self::SCENARIO_RADIO,
                self::SCENARIO_DROPDOWNLIST,
                self::SCENARIO_WIDGET
            ],
            'multiple' => [
                self::SCENARIO_CHECKBOXLIST,
                self::SCENARIO_LISTBOX
            ]
        ];
    }

}
