<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        // 系统配置
//        'settings' => [
//           'class' =>  \fatcms\settings\components\Settings::class,
//        ],

        'formatter' => [
            'dateFormat' => 'yyyy-MM-dd',
            'locale' => 'zh-CN',
            'datetimeFormat' => 'yyyy-MM-dd HH:mm:ss',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'CNY',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
