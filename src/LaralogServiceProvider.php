<?php

namespace ConfettiCode\Laralog;

use ConfettiCode\Laralog\Telegram\MessageFormatter;
use Illuminate\Log\LogManager;
use Illuminate\Support\ServiceProvider;
use Monolog\Handler\TelegramBotHandler;
use Monolog\Logger;

class LaralogServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(LogManager $manager)
    {
        $manager->extend('telegram', function ($app, array $config) {
            $formatter = new MessageFormatter(null, $this->dateFormat, true, true);
            $formatter->includeStacktraces();

            $handler = new TelegramBotHandler($config['api_key'], $config['chat'], $config['level'], true, $config['parse_mode'] ?? 'MarkdownV2');
            $handler->setFormatter($formatter);

            return new Logger($this->parseChannel($config), [$handler]);
        });
    }
}
