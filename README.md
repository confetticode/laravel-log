# Integrate multi log channels with Laravel

> This package is in development and not ready for production. First release will come with Laravel 9.x.

## Installation

You can install the package via composer:

```bash
composer require confetticode/laralog
```

Configure your expected channel variables:

```bash
LOG_TELEGRAM_LEVEL=critical
LOG_TELEGRAM_API_KEY=1xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
LOG_TELEGRAM_CHAT_ID="@channel_or_group_id"
```

Test your configuration by running this command:

```bash
php artisan laralog --channel=telegram --message="Test sending a log message via telegram"
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
