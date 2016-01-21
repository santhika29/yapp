<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);


return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        //additional modul for rbac management gui
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => '@backend/views/layouts/main', // it can be '@path/to/your/layout'.
            'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'userClassName' => 'common\models\User',
                    'idField' => 'id'
                ],
            ],
            'menus' => [
            'assignment' => [
                'label' => 'Grand Access' // change label
            ],
            //'route' => null, // disable menu route
        ] 
        ],
    ],
    'components' => [
        // here you can set theme used for your backend application 
        // - template comes with: 'default', 'slate', 'spacelab' and 'cerulean'
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@webroot/themes/spacelab/views',
                ],
                'baseUrl' => '@web/themes/spacelab',
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\UserIdentity',
            'enableAutoLogin' => true,
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
        //additional component
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ],
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            //'admin/*', // add or remove allowed actions to this list
            'debug/*',
            'audit/*',
        ]
    ],
    'params' => $params,
];
