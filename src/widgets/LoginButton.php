<?php

namespace portalium\site\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use portalium\site\Module;

class LoginButton extends Widget
{
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
        if (Yii::$app->user->isGuest) {
            return '<li class="nav-item">' . Html::a($this->icon . Module::t('Login'), ['/site/auth/login'], ['class' => 'nav-link']) . '</li>';
        } else {
            return '<li class="nav-item">' . Html::a($this->icon . Module::t('Logout'). ' (' . Yii::$app->user->identity->username . ')',['/site/auth/logout'],['class' => 'nav-link']) . '</li>';
        }
    }
}
