<?php

namespace portalium\site\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use portalium\menu\Module;
use portalium\menu\models\MenuItem;
use portalium\theme\widgets\NavBar;
use portalium\theme\widgets\Nav as BaseNav;

class LoginButton extends Widget
{
    
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        if (Yii::$app->user->isGuest) {
            return '<li>' . Html::a(Module::t('Login'), ['/site/auth/login']) . '</li>';
        } else {
                return '<li>'
                . Html::beginForm(['/site/auth/logout'], 'post')
                . Html::submitButton(
                    Module::t('Logout'). ' (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>';
        }
    }
}