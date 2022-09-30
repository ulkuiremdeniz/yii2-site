<?php
use yii\db\Migration;

class m010101_010101_site_rbac extends Migration
{
    public function up()
    {
        $auth = Yii::$app->authManager;
        $admin = $auth->createRole('admin');
        $admin->description = 'Admin';
        $auth->add($admin);

        // add "viewUser" permission
        $siteWebSettingIndex = $auth->createPermission('siteWebSettingIndex');
        $siteWebSettingIndex->description = 'siteWebSettingIndex';
        $auth->add($siteWebSettingIndex);
        $auth->addChild($admin, $siteWebSettingIndex);

        // add "viewGroup" permission
        $siteWebSettingUpdate = $auth->createPermission('siteWebSettingUpdate');
        $siteWebSettingUpdate->description = 'siteWebSettingUpdate';
        $auth->add($siteWebSettingUpdate);
        $auth->addChild($admin, $siteWebSettingUpdate);

    }

    public function down()
    {
        $auth = Yii::$app->authManager;
        $auth->remove($auth->getPermission('siteWebSettingIndex'));
        $auth->remove($auth->getPermission('siteWebSettingUpdate'));

    }
}