<?php

namespace ConfettiCode\Laralog;

use ConfettiCode\Laralog\Channels\Telegram\MessageFormatter;
use ConfettiCode\Laralog\Console\LaralogCommand;
use Illuminate\Log\LogManager;
use Illuminate\Support\ServiceProvider;
use Monolog\Handler\TelegramBotHandler;
use Monolog\Logger;

class LaralogServiceProvider extends ServiceProvider
{
    public function register()
    {
        /**
         * {@inheritdoc}
         */
        parent::register();

        $channels = (require __DIR__ . '/../config/logging.php')['channels'];

        $this->app['config']->set('logging.channels', array_merge($this->app['config']->get('logging.channels'), $channels));
    }

    /**
     * {@inheritdoc}
     */
    public function boot(LogManager $manager)
    {
        $this->commands(LaralogCommand::class);

        $manager->extend('telegram', function ($app, array $config) {
            $formatter = new MessageFormatter(null, $this->dateFormat, true, true);
            $formatter->includeStacktraces();

            $handler = new TelegramBotHandler($config['api_key'], $config['chat_id'], $config['level'], true, $config['parse_mode'] ?? 'MarkdownV2');
            $handler->setFormatter($formatter);

            return new Logger($this->parseChannel($config), [$handler]);
        });
    }
}
