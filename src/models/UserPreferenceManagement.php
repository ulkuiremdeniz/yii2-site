<?php

namespace portalium\site\models;

use portalium\base\Event;
use portalium\site\Module;

class UserPreferenceManagement extends ActiveRecord
{
    public static function tableName()
    {
        return '{{' . Module::$tablePrefix . 'preference-management}}';
    }

    public function rules()
    {
        return [
            [['module', 'name', 'label', 'type'], 'required'],
            ['value' => Form::TYPE_INPUT],
            ['value', 'safe'],
        ];
    }

//    public function init()
//    {
//        $this->on(self::EVENT_AFTER_UPDATE, function ($event) {
//
//            if ($event->changedAttributes && Yii::$app->getModule($event->data['module'])) {
//                Event::trigger(Yii::$app->getModule($event->data['module']), Module::EVENT_SETTING_UPDATE, new Event(['payload' => [
//                    'data' => $event->data,
//                    'changedAttributes' => $event->changedAttributes
//                ]]));
//            }
//        }, $this);
//    }

    public function attributeLabels()
    {
        return [
            'id_preference' => 'Id Preference',
            'id_user' => 'Id User',
            'id_setting' => 'Id Setting',
            'value' => 'Value',
        ];
    }
}
