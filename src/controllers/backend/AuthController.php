<?php

namespace portalium\site\controllers\backend;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use portalium\site\models\LoginForm;
use portalium\web\Controller as WebController;

class AuthController extends WebController
{
    public function actionIndex()
    {
        return $this->redirect('login');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}
