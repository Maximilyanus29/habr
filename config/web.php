<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ]
    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@phpQuery' => '@vendor/phpquery',
    ],

    'components' => [
        'request' => [
            'baseUrl'=> '',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'gawfawfaw',
        ],

        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'index' => 'site/index',
                'post/<id:\d+>'=> 'post/index',
                'post/<action:\w+>/<id:\d+>'=> 'post/<action>',
                'post/<id:\d+>/comments'=> 'post/comments',
                'posts/mypost'=> 'post/myposts',
                'user/<id:\d+>'=> 'user/user',
                'user/<id:\d+>/<action:\w+>'=> 'user/<action>',
                '/' => 'site/index',
                'login' => 'site/login',
                'all' => 'site/all',
                '/help' => 'site/help',
                '/callback' => 'site/callback',
                '/search' => 'site/search',
                '/addbookmark/<id:\d+>' => 'site/addbookmark',

                'top' => 'site/top',
                'about' => 'site/about',
                'contact' => 'site/contact',
                'lk'=>'site/login',
                'category/<id:\d+>' =>'site/category',
                'admin/category/<id:\d+>'=>'admin/default/parse',
                'users/'=>'user/index',
                'companyes/'=>'site/companyes',
                'company/<id:\d+>'=>'site/company'

            ],
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
