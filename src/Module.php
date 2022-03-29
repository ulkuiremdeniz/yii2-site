<?php

namespace portalium\site;

use Yii;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use portalium\site\widgets\LoginButton;

class Module extends \portalium\base\Module
{
    const EVENT_ON_LOGIN = 'siteAfterLogin';
    const EVENT_ON_SIGNUP = 'siteAfterSignup';

    public $apiRules = [
        [
            'class' => 'yii\rest\UrlRule',
            'controller' => [
                'site/auth',
            ]
        ],
    ];

    public static $tablePrefix = 'site_';

    public function getMenuItems(){
        $menuItems = [
            [
                [
                    'type' => 'widget',
                    'label' => LoginButton::widget(),
                    'name' => 'Login',
                ]
            ],
        ];
        return $menuItems;
    }

    public static function moduleInit()
    {
        self::registerTranslation('site','@portalium/site/messages',[
            'site' => 'site.php',
        ]);
    }

    public function registerComponents()
    {
        return [
            'theme' => [
                'class' => 'portalium\theme\Theme'
            ]
        ];
    }

    public static function t($message, array $params = [])
    {
        return parent::coreT('site', $message, $params);
    }

    public static function settingT($category, $message, array $params = [])
    {
        self::registerTranslation($category,'@portalium/'. $category .'/messages',[
            $category => $category.'.php',
        ]);

        return parent::coreT($category, $message, $params);
    }
}
