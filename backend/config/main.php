<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'Fat CMS-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'name' => 'Fat CMS Admin',
    'language' => 'zh-CN',
    'timeZone' => 'PRC',
    'modules' => [],
    'components' => [
        // backend adminlte theme
        'view' => [
            'theme' => [
                'basePath' => "@backend/themes/adminlte",
                'baseUrl' => '@web/themes/adminlte',
                'pathMap' => [
                    '@backend/views' => '@backend/themes/adminlte'
                ],
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'dmstr\web\AdminLteAsset' => [
                    'skin' => 'skin-blue',
                ],
            ],
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'backend\models\Admin',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
            // 登录事件
            'on afterLogin' => function($event) {

            }
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'fat-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index'
            ],
        ],

    ],
    'params' => $params,
];
