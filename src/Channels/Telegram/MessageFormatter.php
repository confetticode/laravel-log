<?php

namespace ConfettiCode\Laravel\Logging\Channels\Telegram;

use Monolog\Formatter\LineFormatter;

class MessageFormatter extends LineFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(array $record): string
    {
        return '```' . PHP_EOL . parent::format($record) . PHP_EOL .'```';
    }
}
