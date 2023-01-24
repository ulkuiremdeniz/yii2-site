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
            'host' => Yii::$app->setting->getValue('smtp::server'),
            'username' => Yii::$app->setting->getValue('smtp::username'),
            'password' => Yii::$app->setting->getValue('smtp::password'),
            'port' => Yii::$app->setting->getValue('smtp::port'),
            'encryption' => Yii::$app->setting->getValue('smtp::encryption'),
        ];

        $this->setTransport($transport);
    }
}
