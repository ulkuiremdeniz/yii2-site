<?php

use yii\db\Migration;
use portalium\site\Module;
use yii\helpers\ArrayHelper;
use portalium\site\models\Form;

class m010101_010102_site_setting extends Migration
{
    public function up()
    {
        $roles = ArrayHelper::map(
            Yii::$app->authManager->getRoles(),
            'name',
            'name'
        );

        $this->insert(Module::$tablePrefix . 'setting', [
            'module' => 'site',
            'name' => 'default::role',
            'label' => 'Default Admin Role',
            'value' => 'admin',
            'type' => Form::TYPE_DROPDOWNLIST,
            'config' => json_encode([
                'model' => [
                    'class' => 'portalium\site\models\DbManager', 
                    'map' => [
                        'key' => 'name' ,
                        'value' => 'name'
                    ],
                    'where' => [
                        'type' => 1
                    ]
                ]
            ])
        ]);

        $this->insert(Module::$tablePrefix . 'setting', [
            'module' => 'site',
            'name' => 'admin::user_role',
            'label' => 'Default User Role',
            'value' => '0',
            'type' => Form::TYPE_DROPDOWNLIST,
            'config' => json_encode([
                'model' => [
                    'class' => 'portalium\site\models\DbManager', 
                    'map' => [
                        'key' => 'name' ,
                        'value' => 'name'
                    ],
                    'where' => [
                        'type' => 1
                    ]
                ]
            ])
        ]);
    }

    public function down()
    {
        $this->dropTable(Module::$tablePrefix . 'setting');
    }
}
