<?php

return [

    'channels' => [

        'mail' => [
            'driver' => 'mail',
            'mailer' => env('LOG_MAIL_DRIVER'),
            'level' => env('LOG_MAIL_LEVEL', 'critical'),
            'from' => env('LOG_MAIL_FROM'),
            'to' => env('LOG_MAIL_TO'),
        ],

        'telegram' => [
            'driver' => 'telegram',
            'level' => env('LOG_TELEGRAM_LEVEL', 'critical'),
            'api_key' => env('LOG_TELEGRAM_API_KEY'),
            'chat_id' => env('LOG_TELEGRAM_CHAT_ID'),
        ],

    ],

];
