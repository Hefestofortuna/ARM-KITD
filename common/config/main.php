<?php
use kartik\datecontrol\Module;
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'dateFormat' => 'dd-MM-yyyy',
            'datetimeFormat' => 'dd-MM-yyyy HH:mm:ss a',
            'timeZone' => 'Europe/Moscow',
            'defaultTimeZone' => 'UTC',
        ],
            'datecontrol' =>[
                'class' => 'kartik\datecontrol\Module',
                'displaySettings' => [
                    Module::FORMAT_DATE => 'dd-MM-yyyy',
                    Module::FORMAT_TIME => 'HH:mm:ss a',
                    Module::FORMAT_DATETIME => 'dd-MM-yyyy HH:mm:ss a', 
                ],
            ],
       // 'formatter' => [
       //     'dateFormat' => 'php:m-d-Y',
       //     'datetimeFormat' => 'php:m-d-Y H:i',
       //     'timeZone' => 'Europe/Moscow',
       //     'defaultTimeZone' => 'UTC',
       // ],
    ],
];
