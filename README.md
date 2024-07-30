# Laravel Log

[![Latest Version on Packagist](https://img.shields.io/packagist/v/confetticode/laravel-log.svg?style=flat-square)](https://packagist.org/packages/confetticode/laravel-log)
[![Tests](https://img.shields.io/github/actions/workflow/status/confetticode/laravel-log/tests.yml?branch=master&label=tests&style=flat-square)](https://github.com/confetticode/laravel-log/actions/workflows/tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/confetticode/laravel-log.svg?style=flat-square)](https://packagist.org/packages/confetticode/laravel-log)

## Installation

You can install the package via composer:

```bash
composer require confetticode/laravel-log
```

Configure your expected channel variables:

```bash
LOG_MAIL_DRIVER=smtp
LOG_MAIL_LEVEL=error
LOG_MAIL_FROM=internal@confetticode.com
LOG_MAIL_TO=devops@confetticode.com

LOG_TELEGRAM_LEVEL=error
LOG_TELEGRAM_API_KEY=1xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
LOG_TELEGRAM_CHAT_ID="@channel_or_group_id"
```

## Usage

Send a log entry to mail or telegram:

```php
# Sending a log entry via mail.
Log::channel('mail')->error('Test mail log channel.');

# Sending a log entry via telegram.
Log::channel('telegram')->error('Test telegram log channel.');
```

Or update the `config/logging.php` to push telegram and mail channels in the stack:

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

<div id="contributing"></div>

## Contributing

Thank you for considering contributing to the `ConfettiCode` project! The contribution guide can be found in the [contributing documentation](https://github.com/confetticode/.github/blob/master/CONTRIBUTING.md).

<div id="license"></div>

## License (MIT)

The MIT License (MIT). Please see the [License](./LICENSE.md) for more information.
