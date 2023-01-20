<?php

namespace portalium\site\controllers\api;

use portalium\site\models\Setting;
use portalium\site\Module;
use Yii;
use yii\web\HttpException;
use portalium\user\models\User;
use portalium\site\models\SignupForm;
use portalium\site\models\LoginForm;
use portalium\rest\ActiveController as RestActiveController;
use yii\web\ForbiddenHttpException;

class SettingController extends RestActiveController
{
    public $modelClass = 'portalium\site\models\Setting';
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        return $behaviors;
    }
    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['dataFilter'] = [
            'class' => \yii\data\ActiveDataFilter::class,
            'searchModel' => $this->modelClass,
        ];
        $actions['index']['prepareDataProvider'] = function ($action) {
            if(!Yii::$app->user->can('siteAPISettingIndex'))
                throw new ForbiddenHttpException('You are not allowed to access this page.');

            $model = new $this->modelClass;
            $query = $model::find();
            $dataProvider = new \yii\data\ActiveDataProvider([
                'query' => $query,
            ]);

            return $dataProvider;
        };
        return $actions;
    }
}
