<?php

use portalium\menu\models\Menu;
use portalium\menu\models\MenuItem;
use yii\db\Migration;
use portalium\site\models\Form;

class m010101_010102_site_menu extends Migration
{

    public function up()
    {

        $this->insert('menu_menu', [
            'name' => 'site',
            'slug' => 'site',
            'type' => Menu::TYPE['web']
        ]);
        $id_menu = $this->db->getLastInsertID();

        $this->insert('menu_item', [
            'id_menu' => $id_menu,
            'id_parent' => 0,
            'name_auth' => 'admin',
            'label' => 'Home',
            'slug' => 'site/home',
            'type' => MenuItem::TYPE['route'],
            'data' => json_encode([
                'routeType' => 'route',
                'route' => '/site/site/index'
            ]),
            'sort' => 1
        ]);

    }

    public function down()
    {
        $this->dropTable('site_setting');
    }
}
