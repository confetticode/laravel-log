<?php

namespace ConfettiCode\Laravel\Log\Channels\Telegram;

use Monolog\Formatter\LineFormatter;
use Monolog\LogRecord;

class MessageFormatter extends LineFormatter
{
    public function format(LogRecord $record): string
    {
        return '```' . PHP_EOL . parent::format($record) . PHP_EOL .'```';
    }
}
