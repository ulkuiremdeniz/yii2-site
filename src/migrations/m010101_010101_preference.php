<?php

use yii\db\Migration;
use portalium\site\Module;
class m010101_010101_preference extends Migration
{
    public function up()
    {

        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(Module::$tablePrefix . 'preference-management', [
            'id_preference' => $this->primaryKey(),
            'id_user' => $this->integer()->notNull(),
            'id_setting' => $this->integer()->notNull(),
            'value' => $this->text(),
        ],
            $tableOptions
        );

        $this->addForeignKey(
            '{{%fk-' . Module::$tablePrefix . 'id_user}}',
            '{{%' . Module::$tablePrefix . 'preference-management}}',
            'id_user',
            '{{%' . UserModule::$tablePrefix . 'user}}',
            'id_user',
            'CASCADE'
        );

        $this->addForeignKey(
            '{{%fk-' . Module::$tablePrefix . 'id}}',
            '{{%' . Module::$tablePrefix . 'preference-management}}',
            'id_setting',
            '{{%' . UserModule::$tablePrefix . 'setting}}',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%' . Module::$tablePrefix . 'preference-management}}');
    }

}