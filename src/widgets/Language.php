<?php

namespace portalium\site\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use portalium\site\Module;
use portalium\theme\widgets\Nav;
use portalium\site\models\Setting;
use portalium\menu\models\MenuItem;
use portalium\theme\widgets\NavBar;
use portalium\theme\widgets\Nav as BaseNav;

class Language extends Widget
{
    
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $languages  = json_decode(Setting::findOne(['name' => 'app::language'])->config,true);
        $langItems = [];

        foreach ($languages as $key => $value){
            $langItems[] = [
                'label' => Module::t($value),
                'url' => ['/site/home/lang','lang' => $key]
            ];
        }

        $menuItems[] = [
            'label' => Module::t($languages[Yii::$app->language]),
            'url' => ['/site/home/lang','lang' => Yii::$app->language],
            'items' => $langItems,
        ];
        
        return Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems,
        ]);
        
    }
}