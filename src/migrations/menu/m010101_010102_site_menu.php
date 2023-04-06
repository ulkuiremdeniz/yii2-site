<?php

use portalium\menu\models\Menu;
use yii\db\Migration;

class m010101_010102_site_menu extends Migration
{

    public function up()
    {
        $id_menu = Menu::find()->where(['slug' => 'web-menu'])->one()->id_menu;
        $this->batchInsert('menu_item', ['id_item', 'label', 'slug', 'type', 'style', 'data', 'sort', 'id_menu', 'name_auth', 'id_user', 'date_create', 'date_update'], [
            [NULL, 'Settings', 'setting', '2', '{"icon":"","color":"","iconSize":""}', '{"type":"2","data":{"module":"site","routeType":"action","route":"\\/site\\/setting\\/index","model":null,"menuRoute":null,"menuType":"web"}}', 9, $id_menu, 'siteWebSettingIndex', 1,'2022-06-14 13:34:04', '2022-06-14 13:34:04'],
            [NULL, 'Language', 'language', '2', '{"icon":"","color":"","iconSize":""}', '{"type":"2","data":{"module":"site","routeType":"widget","route":"portalium\\\\site\\\\widgets\\\\Language","model":null,"menuRoute":null,"menuType":"web"}}', 10, $id_menu, '', 1,'2022-06-14 13:34:36', '2022-06-14 13:34:36'],
            [NULL, 'Login', 'login', '2', '{"icon":"","color":"","iconSize":""}', '{"type":"2","data":{"module":"site","routeType":"widget","route":"portalium\\\\site\\\\widgets\\\\LoginButton","model":null,"menuRoute":null,"menuType":"web"}}', 11, $id_menu, '', 1,'2022-06-14 13:35:38', '2022-06-14 13:35:38'],
        ]);
    }

    public function down()
    {

    }
}
