# Laravel Log

[![Latest Version on Packagist](https://img.shields.io/packagist/v/confetticode/laravel-log.svg?style=flat-square)](https://packagist.org/packages/confetticode/laravel-log)
[![Tests](https://img.shields.io/github/actions/workflow/status/confetticode/laravel-log/tests.yml?branch=master&label=tests&style=flat-square)](https://github.com/confetticode/laravel-log/actions/workflows/tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/confetticode/laravel-log.svg?style=flat-square)](https://packagist.org/packages/confetticode/laravel-log)

## Installation

You can install the package via composer:

```bash
composer require confetticode/laravel-log
```

## Usage

Configure your environment variables:

```bash
LOG_MAIL_DRIVER=smtp
LOG_MAIL_LEVEL=error
LOG_MAIL_FROM=internal@confetticode.com
LOG_MAIL_TO=devops@confetticode.com

LOG_TELEGRAM_LEVEL=error
LOG_TELEGRAM_API_KEY=1xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
LOG_TELEGRAM_CHAT_ID="@channel_or_group_id"
```

Send a log entry to mail or telegram:

```php
# Sending a log entry via mail.
Log::channel('mail')->error('Test mail log channel.');

# Sending a log entry via telegram.
Log::channel('telegram')->error('Test telegram log channel.');
```

You may want to update the `config/logging.php` to push telegram and mail channels in the stack:

```php
<?php
return [
   'channels' => [
        'stack' => [
            'driver' => 'stack',
            'channels' => ['daily', 'telegram', 'mail'],
            'ignore_exceptions' => false,
        ],
     ],
];
```

You may use `mail` and `telegram` log drivers however you want. Please read the [logging.php](./config/logging.php) to know about their configuration!

<div id="license"></div>

## License (MIT)

The `confetticode/laravel-log` package is licensed under the [MIT license](./LICENSE.md).
