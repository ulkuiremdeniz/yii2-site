<?php

namespace portalium\site\controllers\backend;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\base\Model;
use portalium\site\models\LoginForm;
use portalium\site\models\SettingSearch;
use portalium\site\models\Setting;
use portalium\site\Module;
use portalium\web\Controller as WebController;

class SettingController extends WebController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $settings = Setting::find()
            ->orderBy(['category' => SORT_ASC,'id' => SORT_ASC,'name'=>SORT_ASC])
            ->indexBy('id')
            ->all();
       
        return $this->render('index', [
            'settings' => $settings,
        ]);
    }

    public function actionUpdate()
    {
        $settings = Setting::find()->indexBy('id')->all();

        if (Model::loadMultiple($settings, Yii::$app->request->post()) && Model::validateMultiple($settings)) {
            foreach ($settings as $setting) {
                $setting->save(false);
            }
            Yii::$app->session->setFlash('success', Module::t('Settings saved.'));
        }else{
            Yii::$app->session->setFlash('error', Module::t('There are an error. Settings not saved.'));
        }

        return $this->redirect('index');
    }
}
