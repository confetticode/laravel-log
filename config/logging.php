<?php

return [
    'channels' => [
        'telegram' => [
            'driver' => 'telegram',
            'level' => env('LOG_TELEGRAM_LEVEL', 'critical'),
            'api_key' => env('LOG_TELEGRAM_API_KEY'),
            'chat_id' => env('LOG_TELEGRAM_CHAT_ID'),
        ],
    ],
];
