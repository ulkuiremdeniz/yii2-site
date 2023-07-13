<?php

namespace portalium\site\models;

use portalium\site\Module;
use Yii;
use portalium\user\models\User;
use yii\base\Model;

class ResendVerificationEmailForm extends Model
{

    /**
     * @var string
     */
    public $email;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => '\portalium\user\models\User',
                'filter' => ['status' => User::STATUS_PASSIVE],
                'message' => 'There is no user with this email address.'
            ],
        ];
    }

    /**
     * Sends confirmation email to user
     *
     * @return bool whether the email was sent
     */
    public function sendEmail()
    {
        $user = User::findOne([
            'email' => $this->email,
            'status' => User::STATUS_PASSIVE
        ]);

        if ($user === null) {
            return false;
        }

        Yii::$app->mailer->setViewPath(Yii::getAlias('@portalium/site/mail'));

        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )

            ->setFrom([Yii::$app->setting->getValue('email::address') => Yii::$app->setting->getValue('email::displayname')])
            ->setTo($this->email)
            ->setSubject(Module::t('Email reset for {email_displayname}!',['email_displayname' =>Yii::$app->setting->getValue('email::displayname')] ))
            ->send();


    }



}