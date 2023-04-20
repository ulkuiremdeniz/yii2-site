<?php

namespace portalium\site\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use portalium\site\Module;
use portalium\theme\widgets\Nav;
use portalium\menu\models\MenuItem;

class Language extends Widget
{
    public $options;

    public $icon;
    public $display;

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
                'url' => ['/site/home/lang','lang' => $key],
            ];
        }

        $menuItems[] = [
            'label' => $this->generateLabel("Language"),
            'url' => ['/site/home/lang','lang' => Yii::$app->language],
            'items' => $langItems,
            'display' => $this->display,
        ];

        return Nav::widget([
            'options' => $this->options,
            'items' => $menuItems,
        ]);
    }

    private function generateLabel($text)
    {
        $label = "";
            if(isset($this->display)){
                switch ($this->display) {
                    case MenuItem::TYPE_DISPLAY['icon']:
                        $label = $this->icon;
                        break;
                    case MenuItem::TYPE_DISPLAY['icon-text']:
                        $label = $this->icon . Module::t($text);
                        break;
                    case MenuItem::TYPE_DISPLAY['text']:
                        $label = Module::t($text);
                        break;
                    default:
                        $label = Module::t($text);
                        break;
                }
            }else{
                $label = $this->icon . Module::t($text);
            }

        return $label;
    }
}
