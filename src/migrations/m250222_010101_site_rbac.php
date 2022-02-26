<?php
use yii\db\Migration;

class m250222_010101_site_rbac extends Migration
{
    public function up()
    {
        $auth = Yii::$app->authManager;
        $siteSettingManage = $auth->createPermission('siteSettingManage');
        $siteSettingManage->description = "site module setting manage access permission";
        $auth->add($siteSettingManage);
    }
}