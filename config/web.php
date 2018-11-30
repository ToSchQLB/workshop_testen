<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'M5M_GCRJhpfX13AVhqrW4YRPzNkxj8Yt',
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
        'authManager' => \yii\rbac\DbManager::className(),
        'i18n' => [
            'translations' => [
                'projekt' => [
                    'class' => \yii\i18n\PhpMessageSource::className(),
                    'basePath' => '@app/messages',
                    'fileMap' => [
                        'projekt' => 'projekt.php'
                    ]
                ],
                'ticket' => [
                    'class' => \yii\i18n\PhpMessageSource::className(),
                    'basePath' => '@app/messages',
                    'fileMap' => [
                        'ticket' => 'ticket.php'
                    ]
                ],
                'app' => [
                    'class' => \yii\i18n\PhpMessageSource::className(),
                    'basePath' => '@app/messages',
                    'fileMap' => [
                        'app' => 'app.php'
                    ]
                ]
            ]

        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
    'modules' => [
        'user' => [
            'class' => Da\User\Module::className(),
            'routes' => [
                '<id:\d+>' => 'profile/show',
                '<action:(login|logout)>' => 'security/<action>',
                '<action:(register|resend)>' => 'registration/<action>',
                'confirm/<id:\d+>/<code:[A-Za-z0-9_-]+>' => 'registration/confirm',
                'forgot' => 'recovery/request',
                'recover/<id:\d+>/<code:[A-Za-z0-9_-]+>' => 'recovery/reset',
                'settings/<action:\w+>' => 'settings/<action>',
            ],
            'generatePasswords' => false,
            'administrators' => ['toni.schreiber'],
//            'administratorPermissionName' => 'Nutzerverwaltung',
            // ...other configs from here: [Configuration Options](installation/configuration-options.md), e.g.
            // 'generatePasswords' => true,
            // 'switchIdentitySessionKey' => 'myown_usuario_admin_user_key',
        ],
    ]
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
