<?php

namespace portalium\site\components;

use Yii;
use portalium\components\Mailer as CoreMailer;

class Mailer extends CoreMailer
{
    public function init()
    {
        parent::init();

        $transport = [
            'class' => 'Swift_SmtpTransport',
            'host' => Yii::$app->settings->getValue('smtp::server'),
            'username' => Yii::$app->settings->getValue('smtp::username'),
            'password' => Yii::$app->settings->getValue('smtp::password'),
            'port' => Yii::$app->settings->getValue('smtp::port'),
            'encryption' => Yii::$app->settings->getValue('smtp::encryption'),
        ];

        $this->setTransport($transport);
    }
}
