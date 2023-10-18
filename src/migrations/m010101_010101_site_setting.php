<?php

use portalium\content\models\Content;
use yii\db\Migration;
use portalium\site\Module;
use portalium\site\models\Form;

class m010101_010101_site_setting extends Migration
{
    public function up()
    {
        $this->createTable('site_setting', [
            'id' => $this->primaryKey(),
            'module' => $this->string(64)->notNull(),
            'name' => $this->string(64)->notNull(),
            'label' => $this->string(64)->notNull(),
			'value' => $this->text(),
            'type' => $this->tinyInteger(1)->notNull(),
            'config' => $this->text(),
            'is_preference' => $this->tinyInteger(1)->defaultValue(0), // Boolean attribute
        ]);
        $this->insert(Module::$tablePrefix . 'setting', [
            'module' => 'site',
            'name' => 'site::actions_permissions',
            'label' => 'Action Permissions',
            'value' => '',
            'type' => 4, //Form::TYPE_HIDDENINPUT,
            'config' => ''
        ]);
        $this->insert(Module::$tablePrefix . 'setting', [
            'module' => 'site',
            'name' => 'app::title',
            'label' => 'Title',
            'value' => 'Portalium',
            'type' => Form::TYPE_INPUTTEXT,
            'config' => ''
        ]);

        $this->insert(Module::$tablePrefix . 'setting', [
            'module' => 'site',
            'name' => 'app::language',
            'label' => 'Language',
            'value' => 'en-US',
            'type' => Form::TYPE_DROPDOWNLIST,
            'config' => json_encode([ 'en-US' => 'English','tr-TR' => 'Turkish'])
        ]);

        $this->insert(Module::$tablePrefix . 'setting', [
            'module' => 'site',
            'name' => 'page::home',
            'label' => 'Home Page',
            'value' => '0',
            'type' => Form::TYPE_DROPDOWNLIST,
            'config' => json_encode([
                'model' => [
                    'class' => 'portalium\content\models\Content', 
                    'map' => [
                        'key' => 'id_content' ,
                        'value' => 'name'
                    ],
                    'where' => [
                        'status' => Content::STATUS['publish']
                    ]
                ]
            ])
        ]);

        $this->insert(Module::$tablePrefix . 'setting', [
            'module' => 'site',
            'name' => 'auth::layout',
            'label' => 'Auth Layout',
            'type' => Form::TYPE_DROPDOWNLIST,
            'value' => 'login',
            'config' => json_encode([
                'method' => [
                    'class' => 'portalium\theme\Module',
                    'name' => 'getLayouts',
                    'map' => [
                        'key' => 'layout',
                        'value' => 'name'
                    ]
                ]
            ])
        ]);

        $this->insert(Module::$tablePrefix . 'setting', [
            'module' => 'site',
            'name' => 'app::logo_wide',
            'label' => 'Application Logo Wide',
            'value' => '0',
            'type' => Form::TYPE_WIDGET,
            'config' => json_encode([
                'widget' => '\portalium\storage\widgets\FilePicker',
                'options' => [
                    'multiple' => 0,
                    'returnAttribute' => ['name'],
                    'name' => 'app::logo_wide',
                ]
            ])
        ]);

        $this->insert(Module::$tablePrefix . 'setting', [
            'module' => 'site',
            'name' => 'app::logo_square',
            'label' => 'Application Logo Square',
            'value' => '0',
            'type' => Form::TYPE_WIDGET,
            'config' => json_encode([
                'widget' => '\portalium\storage\widgets\FilePicker',
                'options' => [
                    'multiple' => 0,
                    'returnAttribute' => ['name'],
                    'name' => 'app::logo_square',
                ]
            ])
        ]);

        $this->insert(Module::$tablePrefix . 'setting', [
            'module' => 'site',
            'name' => 'form::signup',
            'label' => 'Signup Form',
            'value' => '1',
            'type' => Form::TYPE_RADIOLIST,
            'config' => json_encode([ 1 => 'Show', 0 => 'Hide'])
        ]);

        $this->insert(Module::$tablePrefix . 'setting', [
            'module' => 'site',
            'name' => 'form::login',
            'label' => 'Login Form',
            'value' => '1',
            'type' => Form::TYPE_RADIOLIST,
            'config' => json_encode([ 1 => 'Show', 0 => 'Hide'])
        ]);

        $this->insert(Module::$tablePrefix . 'setting', [
            'module' => 'site',
            'name' => 'form::contact',
            'label' => 'Contact Form',
            'value' => '1',
            'type' => Form::TYPE_RADIOLIST,
            'config' => json_encode([ 1 => 'Show', 0 => 'Hide'])
        ]);

        $this->insert(Module::$tablePrefix . 'setting', [
            'module' => 'site',
            'name' => 'api::signup',
            'label' => 'API Signup',
            'value' => '1',
            'type' => Form::TYPE_RADIOLIST,
            'config' => json_encode([ 1 => 'Allow', 0 => 'Deny'])
        ]);

        $this->insert(Module::$tablePrefix . 'setting', [
            'module' => 'site',
            'name' => 'api::login',
            'label' => 'API Login',
            'value' => '1',
            'type' => Form::TYPE_RADIOLIST,
            'config' => json_encode([ 1 => 'Allow', 0 => 'Deny'])
        ]);
        $this->insert(Module::$tablePrefix . 'setting', [
            'module' => 'site',
            'name' => 'site::verifyEmail',
            'label' => 'Register Confirmation',
            'value' => '1',
            'type' => Form::TYPE_RADIOLIST,
            'config' => json_encode([ 1 => 'Email Confirmation', 0 => 'Disable'])
        ]);
        $this->insert(Module::$tablePrefix . 'setting', [
            'module' => 'site',
            'name' => 'site::userStatus',
            'label' => 'User Status',
            'value' => '1',
            'type' => Form::TYPE_RADIOLIST,
            'config' => json_encode([ 1 => 'Active', 0 => 'Passive'])
        ]);

        $this->insert(Module::$tablePrefix . 'setting', [
            'module' => 'site',
            'name' => 'email::address',
            'label' => 'Email Address',
            'value' => 'info@portalium.dev',
            'type' => Form::TYPE_INPUT,
            'config' => 'email'
        ]);

        $this->insert(Module::$tablePrefix . 'setting', [
            'module' => 'site',
            'name' => 'email::displayname',
            'label' => 'Email Display Name',
            'value' => 'Portal',
            'type' => Form::TYPE_INPUTTEXT,
            'config' => ''
        ]);

        $this->insert(Module::$tablePrefix . 'setting', [
            'module' => 'site',
            'name' => 'smtp::server',
            'label' => 'SMTP Server',
            'value' => 'smtp.gmail.com',
            'type' => Form::TYPE_INPUTTEXT,
            'config' => ''
        ]);

        $this->insert(Module::$tablePrefix . 'setting', [
            'module' => 'site',
            'name' => 'smtp::port',
            'label' => 'SMTP Port',
            'value' => '465',
            'type' => Form::TYPE_INPUTTEXT,
            'config' => ''
        ]);

        $this->insert(Module::$tablePrefix . 'setting', [
            'module' => 'site',
            'name' => 'smtp::username',
            'label' => 'SMTP Username',
            'value' => '',
            'type' => Form::TYPE_INPUTTEXT,
            'config' => ''
        ]);

        $this->insert(Module::$tablePrefix . 'setting',[
            'module' => 'site',
            'name' => 'smtp::password',
            'label' => 'SMTP Password',
            'value' => '',
            'type' => Form::TYPE_INPUTPASSWORD,
            'config' => ''
        ]);

        $this->insert(Module::$tablePrefix . 'setting', [
            'module' => 'site',
            'name' => 'smtp::encryption',
            'label' => 'SMTP Encryption',
            'value' => 'ssl',
            'type' => Form::TYPE_RADIOLIST,
            'config' => json_encode(['ssl' => 'SSL','tls' => 'TLS'])
        ]);

    }

    public function down()
    {
        $this->dropTable(Module::$tablePrefix . 'setting');
    }
}
