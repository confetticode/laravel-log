<?php

namespace ConfettiCode\Laravel\Logging;

use ConfettiCode\Laravel\Logging\Channels\Telegram\MessageFormatter;
use ConfettiCode\Laravel\Logging\Console\Laravel\LoggingCommand;
use Illuminate\Log\LogManager;
use Illuminate\Support\ServiceProvider;
use Monolog\Handler\TelegramBotHandler;
use Monolog\Logger;

class LoggingServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $channels = (require __DIR__ . '/../config/logging.php')['channels'];

        $this->app['config']->set('logging.channels', array_merge($this->app['config']->get('logging.channels'), $channels));
    }

    /**
     * {@inheritdoc}
     */
    public function boot(LogManager $manager)
    {
        $this->configureTelegram($manager);
    }

    protected function configureTelegram(LogManager $manager)
    {
        $manager->extend('telegram', function ($app, array $config) {
            $formatter = new MessageFormatter(null, $this->dateFormat, true, true);
            $formatter->includeStacktraces();

            $handler = new TelegramBotHandler($config['api_key'], $config['chat_id'], $config['level'], true, 'MarkdownV2');
            $handler->setFormatter($formatter);

            return new Logger($this->parseChannel($config), [$handler]);
        });
    }
}
