<?php

namespace portalium\site\models;

use portalium\base\Event;
use yii\base\Model;
use portalium\site\Module;
use Yii;
use portalium\user\models\User;

class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $verifyCode;
    public $first_name;
    public $last_name;

    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\portalium\user\models\User', 'message' => Module::t('This username has already been taken.')],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\portalium\user\models\User', 'message' => Module::t('This email address has already been taken.')],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['first_name', 'safe'],
            ['last_name', 'safe'],

        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => Module::t('Username'),
            'email' => Module::t('Email'),
            'password' => Module::t('Password'),
            'verifyCode' => Module::t('Verify Code'),
            'rememberMe' => Module::t('Remember Me'),
        ];
    }

    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }


        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->setPassword($this->password);
        $user->access_token = \Yii::$app->security->generateRandomString();
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        ;



        if ($user->save() && Yii::$app->setting->getValue('site::verifyEmail'))
        {
            Yii::$app->session->setFlash('success', 'Your registration has been successfully completed. Confirm the confirmation e-mail sent to your e-mail.');
            if($this->sendEmail($user))
            {
                \Yii::$app->trigger(Module::EVENT_ON_SIGNUP, new Event(['payload' => $user]));
                return $user;
            }
        }

        else if($user->save() && !(Yii::$app->setting->getValue('site::verifyEmail')))
        {
            Yii::$app->session->setFlash('success', 'Your registration has been successfully completed.');
            \Yii::$app->trigger(Module::EVENT_ON_SIGNUP, new Event(['payload' => $user]));
            return $user;

        }

        return null;
    }

    protected function sendEmail($user)
    {
        Yii::$app->mailer->setViewPath(Yii::getAlias('@portalium/site/mail'));
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Setting::findOne(['name' => 'email::address'])->value => Setting::findOne(['name' => 'email::displayname'])->value])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
