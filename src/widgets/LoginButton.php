<?php

namespace portalium\site\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use portalium\site\Module;
use portalium\menu\models\MenuItem;

class LoginButton extends Widget
{
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
        if (Yii::$app->user->isGuest) {
            $this->icon = Html::tag('i', '', ['class' => 'fa fa-sign-in', 'style' => 'min-width: 25px;']);
            return '<li class="nav-item">' . Html::a($this->generateLabel('Login'), ['/site/auth/login'], ['class' => 'nav-link']) . '</li>';
        } else {
            $this->icon = Html::tag('i', '', ['class' => 'fa fa-sign-out', 'style' => 'min-width: 25px;']);
            return '<li class="nav-item">' . Html::a($this->generateLabel('Logout', ' (' . Yii::$app->user->identity->username . ')'),['/site/auth/logout'],['class' => 'nav-link']) . '</li>';
        }
    }

    private function generateLabel($text, $param = null)
    {
        $label = "";
            if(isset($this->display)){
                switch ($this->display) {
                    case MenuItem::TYPE_DISPLAY['icon']:
                        $label = $this->icon;
                        break;
                    case MenuItem::TYPE_DISPLAY['icon-text']:
                        $label = $this->icon . Module::t($text) . $param;
                        break;
                    case MenuItem::TYPE_DISPLAY['text']:
                        $label = Module::t($text);
                        break;
                    default:
                        $label = $this->icon . Module::t($text) . $param;
                        break;
                }
            }else{
                $label = $this->icon . Module::t($text) . $param;
            }

        return $label;
    }
}
