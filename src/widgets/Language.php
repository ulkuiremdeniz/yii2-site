<?php

namespace portalium\site\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use portalium\site\Module;
use portalium\theme\widgets\Nav;

class Language extends Widget
{
    public $options;

    public $icon;
    public function init()
    {
        if(!$this->icon){
            $this->icon = Html::tag('i', '', ['class' => '', 'style' => 'margin-right: 5px;']);
        }
        parent::init();
    }

    public function run()
    {
        $languages = Yii::$app->setting->getConfig('app::language');
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
            'options' => $this->options,
            'items' => $menuItems,
        ]);
    }
}
