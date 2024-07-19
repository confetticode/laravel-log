<?php

namespace ConfettiCode\Laravel\Log;

use ConfettiCode\Laravel\Log\Channels\Mail\MailHandler;
use ConfettiCode\Laravel\Log\Channels\Mail\MessageFormatter as MailMessageFormatter;
use ConfettiCode\Laravel\Log\Channels\Telegram\MessageFormatter;
use Illuminate\Log\LogManager;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;
use Monolog\Handler\TelegramBotHandler;
use Monolog\Logger;

class LogServiceProvider extends ServiceProvider
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
        $this->configureTelegramLogger($manager);

        $this->configureMailLogger($manager);
    }

    protected function configureTelegramLogger(LogManager $manager)
    {
        $manager->extend('telegram', function ($app, array $config) {
            $formatter = new MessageFormatter(null, $this->dateFormat, true, true);
            $formatter->includeStacktraces();

            $handler = new TelegramBotHandler($config['api_key'], $config['chat_id'], $config['level'], true, 'MarkdownV2');
            $handler->setFormatter($formatter);

            return new Logger($this->parseChannel($config), [$handler]);
        });
    }

    protected function configureMailLogger(LogManager $manager)
    {
        $manager->extend('mail', function ($app, array $config) {
            $formatter = new MailMessageFormatter(null, $this->dateFormat, true, true);
            $formatter->includeStacktraces();

            $mailer = Mail::mailer($config['mailer']);

            $handler = new MailHandler($mailer, [
                'from' => $config['from'],
                'to' => $config['to'],
            ]);
            $handler->setFormatter($formatter);

            return new Logger($this->parseChannel($config), [$handler]);
        });
    }
}
