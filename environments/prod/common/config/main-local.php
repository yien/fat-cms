<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => env("DB_DSN"),
            'username' => env("DB_USERNAME"),
            'password' => env("DB_PASSWORD"),
            'charset' => env("DB_CHARSET"),
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
        ],
    ],
];
