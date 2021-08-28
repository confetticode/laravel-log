# Integrate multi log channels with Laravel

## Installation

You can install the package via composer:

```bash
composer require confetticode/laralog
```

Configure channels inside `config/logging.php` file:

```php
// After adding, logging.php looks lik this.
return [
    //...
    'channels' => [
        //...
        'telegram' => [
            'driver' => 'telegram',
            'level' => 'critical',
            'api_key' => env('TELEGRAM_API_KEY'),
            'chat' => env('TELEGRAM_CHAT'),
        ],
        //...
   ],
    //...
];
```

## Usage

For example, you may try to send log entry via telegram:

```php
Log::channel('telegram')->critical('Test telegram log channel.');
```

## Testing

```bash
./vendor/bin/phpunit tests
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
