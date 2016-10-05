<?php
use \kartik\datecontrol\Module;

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'name' => 'BANK DATA YAKES TELKOM',
    'language' => 'en',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'app\components\Aliases'],//,'admin'],

    'controllerMap' => [
        'file' => 'mdm\upload\FileController', // use to show or download file
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'Q7dKI_ZzzMYpaEux412BnvrnjzNJpd00',
        ],
        // you can set your theme here - template comes with: 'light' and 'dark'
        
        'view' => [
            'theme' => [
                //'pathMap' => ['@app/views' => '@webroot/themes/adminlte/views'],
                'pathMap' => ['@app/views' => '@webroot/themes/superhero/views'],
                'baseUrl' => '@web/themes/superhero',
            ],
        ],
        
        'assetManager' => [
            /*
            'bundles' => [
                // we will use bootstrap css from our theme
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [], // do not use yii default one
                ],
                //'dmstr\web\AdminLteAsset' => ['skin' => 'skin-red',],
            ],
            */
            'assetMap' => ['ajax-modal-popup.js' => '@themes/js/ajax-modal-popup.js'],
        ],
        
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',

                '<alias:\w+>' => 'site/<alias>',

                //'<controller:\w+>/<id:\d+>' => '<controller>/view',
                //'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                //'<controller:\w+>/<action:\w+>' => '<controller>/<action>',

                //'peserta/<page:\d+>' => 'peserta',
            ],
        ],
        'user' => [
            'identityClass' => 'app\models\UserIdentity',
            'enableAutoLogin' => true,
        ],
        'session' => [
            //'class' => 'yii\web\Session',
            //'savePath' => '@app/runtime/session'
            //saving session on db
            'class' => 'yii\web\DbSession',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'cache' => 'cache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. 
            // You have to set 'useFileTransport' to false and configure a transport for the mailer to send real emails.
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
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/translations',
                    'sourceLanguage' => 'en',
                ],
                'yii' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/translations',
                    'sourceLanguage' => 'en'
                ],
            ],
        ],
        'thumbnail' => [
            'class' => 'sadovojav\image\Thumbnail',
            'cachePath' => 'uploads/thumbnails',
            'prefixPath' => '/bank-data/',
            'options' => [
                'placeholder' => [
                    'type' => sadovojav\image\Thumbnail::PLACEHOLDER_TYPE_JS,
                    'backgroundColor' => '#f5f5f5',
                    'textColor' => '#cdcdcd',
                    'textSize' => 30,
                    'text' => 'Ooops!',
                    'random' => false,
                    'cache' => true,
                ],
                'quality' => 92,
                'tinyPng' => [
                    'apiKey' => null
                ],
            ],
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'dateFormat' => 'php:j M Y',
            'datetimeFormat' => 'php:j M Y H:i',
            'timeFormat' => 'php:H:i',
            'timeZone' => 'UTC',
        ],
        'db' => require(__DIR__ . '/db.php'),
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
        'datecontrol' =>  [
            'class' => 'kartik\datecontrol\Module',
         
            // format settings for displaying each date attribute (ICU format example)
            'displaySettings' => [
                Module::FORMAT_DATE => 'dd-MM-yyyy',
                Module::FORMAT_TIME => 'hh:mm:ss a',
                Module::FORMAT_DATETIME => 'dd-MM-yyyy hh:mm:ss a', 
            ],
                
            // format settings for saving each date attribute (PHP format example)
            'saveSettings' => [
                Module::FORMAT_DATE => 'php:U', // saves as unix timestamp
                Module::FORMAT_TIME => 'php:H:i:s',
                Module::FORMAT_DATETIME => 'php:Y-m-d H:i:s',
            ],
            
            // set your display timezone
            'displayTimezone' => 'Asia/Singapore',
         
            // set your timezone for date saved to db
            'saveTimezone' => 'UTC',
            
            // automatically use kartik\widgets for each of the above formats
            'autoWidget' => true,
         
            // default settings for each widget from kartik\widgets used when autoWidget is true
            'autoWidgetSettings' => [
                Module::FORMAT_DATE => ['type'=>2, 'pluginOptions'=>['autoclose'=>true]], // example
                Module::FORMAT_DATETIME => [], // setup if needed
                Module::FORMAT_TIME => [], // setup if needed
            ],
                
            // custom widget settings that will be used to render the date input instead of kartik\widgets,
            // this will be used when autoWidget is set to false at module or widget level.
            'widgetSettings' => [
                Module::FORMAT_DATE => [
                    'class' => 'yii\jui\DatePicker', // example
                    'options' => [
                        'dateFormat' => 'php:d-M-Y',
                        'options' => ['class'=>'form-control'],
                    ]
                ]
            ],
        ],
        /*
        'admin' => [
            'class' => 'mdm\admin\Module',
            //'layout' => 'top-menu', // it can be '@path/to/your/layout'.
            'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'userClassName' => 'app\models\User',
                    'idField' => 'id',
                ],
                //'other' => [
                //    'class' => 'path\to\OtherController', // add another controller
                //],
            ],
            'menus' => [
                'assignment' => [
                    'label' => 'Grand Access' // change label
                ],
                'route' => null, // disable menu route 
            ]
            
        ]
        */
    ],
    'params' => $params,

    //additional parameter for rbac gui
    /*
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            'admin/*',
            'debug/*',

            // The actions listed here will be allowed to everyone including guests.
            // So, 'admin/*' should not appear here in the production, of course.
            // But in the earlier stages of your development, you may probably want to
            // add a lot of actions here until you finally completed setting up rbac,
            // otherwise you may not even take a first step.
        ]
    ],
    */
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = ['class' => 'yii\debug\Module'];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
