<?php
use yii\db\Migration;

class m010101_010101_site_rbac extends Migration
{
    public function up()
    {
        $auth = Yii::$app->authManager;

        // add "viewUser" permission
        $siteBackendSettingIndex = $auth->createPermission('siteBackendSettingIndex');
        $siteBackendSettingIndex->description = 'siteBackendSettingIndex';
        $auth->add($siteBackendSettingIndex);

        // add "viewGroup" permission
        $siteBackendSettingUpdate = $auth->createPermission('siteBackendSettingUpdate');
        $siteBackendSettingUpdate->description = 'siteBackendSettingUpdate';
        $auth->add($siteBackendSettingUpdate);

    }

    public function down()
    {
        $auth = Yii::$app->authManager;
        $auth->remove($auth->getPermission('siteBackendSettingIndex'));
        $auth->remove($auth->getPermission('siteBackendSettingUpdate'));

    }
}