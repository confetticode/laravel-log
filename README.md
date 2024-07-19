<h1 style="text-align: center;">Laravel Log</h1>

<p style="text-align: center;">
    <a href="https://github.com/confetticode/laravel-log/actions">
        <img src="https://github.com/confetticode/laravel-log/workflows/tests/badge.svg" alt="Build Status">
    </a>
    <a href="https://packagist.org/packages/confetticode/laravel-log">
        <img src="https://img.shields.io/packagist/dt/confetticode/laravel-log" alt="Total Downloads">
    </a>
    <a href="https://packagist.org/packages/confetticode/laravel-log">
        <img src="https://img.shields.io/packagist/v/confetticode/laravel-log" alt="Latest Stable Version">
    </a>
    <a href="https://packagist.org/packages/confetticode/laravel-log">
        <img src="https://img.shields.io/github/license/confetticode/laravel-log" alt="License">
    </a>
</p>

## Installation

You can install the package via composer:

```bash
composer require confetticode/laravel-log
```

Configure your expected channel variables:

```bash
LOG_MAIL_DRIVER=smtp
LOG_MAIL_LEVEL=error
LOG_MAIL_FROM=noreply@example.com
LOG_MAIL_TO=devops@example.com

LOG_TELEGRAM_LEVEL=error
LOG_TELEGRAM_API_KEY=1xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
LOG_TELEGRAM_CHAT_ID="@channel_or_group_id"
```

## Usage

Send a log entry to mail or telegram: 

```php
# Sending a log entry via mail.
Log::channel('mail')->info('Test mail log channel.');

# Sending a log entry via telegram.
Log::channel('telegram')->info('Test telegram log channel.');
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

1. Clone the repository from GitHub.
2. Checkout a new branch.
3. Install composer dependencies and run tests first.
    ```bash
    composer install
    composer run test
    ```
4. Make any changes that you need and run test again.
5. Finally, submit your pull request.

<div id="license"></div>

## License (MIT)

The MIT License (MIT). Please see [License File](./LICENSE.md) for more information.
