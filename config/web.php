<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
    'view' => [
            'theme' => [
                'basePath' => '@app/themes/gentelella',
                'baseUrl' => '@web/../themes/gentelella',
                'pathMap' => [
                    '@app/views' => '@app/themes/gentelella',
                ],
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'dfdfdggd',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
             'urlManager' => [
    'enablePrettyUrl' => true,
    'showScriptName'=>false,
        ],
        'user' => [
            'class' => 'amnah\yii2\user\components\User',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
         'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
             'transport' => [
            'class' => 'Swift_SmtpTransport',
            'host' => 'smtp.gmail.com',
            'username' => 'sukor.muhammad@gmail.com',
            'password' => 'sukormuhammad',
            'port' => '587',
            'encryption' => 'tls',
        ],
            'messageConfig' => [
                'from' => ['admin@website.com' => 'Admin'], // this is needed for sending emails
                'charset' => 'UTF-8',
            ]
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
        'db' => require(__DIR__ . '/db.php'),
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'modules' => [
        'gridview' =>  [
        'class' => '\kartik\grid\Module'
        // enter optional module parameters below - only if you need to  
        // use your own export download action or custom translation 
        // message source
        // 'downloadAction' => 'gridview/export/download',
        // 'i18n' => []
    ],
        'user' => [
            'class' => 'amnah\yii2\user\Module',
            'controllerMap' => [
                'admin'=>'app\controllers\AdminController',
                'default'=>'app\controllers\DefaultController'
            ],
            'modelClasses' => [
                'User' => 'app\models\User',
                'Role' => 'app\models\Role'
            ]
            // set custom module properties here ...
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
