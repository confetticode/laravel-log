<?php

namespace Tests\ConfettiCode\Laravel\Logging\Channels\Telegram;

use ConfettiCode\Laravel\Logging\Channels\Telegram\MessageFormatter;
use Monolog\DateTimeImmutable;
use Monolog\Formatter\LineFormatter;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

class MessageFormatterTest extends TestCase
{
    public function test_format_a_telegram_log_message()
    {
        $record = [
            'message' => 'Just for test',
            'level' => Logger::INFO,
            'level_name' => Logger::getLevelName(Logger::INFO),
            'context' => [],
            'channel' => 'test',
            'datetime' => new DateTimeImmutable(false),
            'extra' => [],
        ];

        $lineFormatter = new LineFormatter();

        $formatter = new MessageFormatter();

        $expected = '```' . PHP_EOL . $lineFormatter->format($record) . PHP_EOL . '```';

        $this->assertSame($expected, $formatter->format($record));
    }
}
