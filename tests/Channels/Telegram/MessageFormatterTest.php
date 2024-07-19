<?php

namespace Tests\Channels\Telegram;

use ConfettiCode\Laravel\Log\Channels\Telegram\MessageFormatter;
use Monolog\DateTimeImmutable;
use Monolog\Formatter\LineFormatter;
use Monolog\Level;
use Monolog\Logger;
use Monolog\LogRecord;
use PHPUnit\Framework\TestCase;

class MessageFormatterTest extends TestCase
{
    public function test_format_a_telegram_log_message()
    {
        $record = new LogRecord(
            datetime: new DateTimeImmutable(false),
            channel: 'test',
            level: Level::Info,
            message: 'Test telegram MessageFormatter',
            context: [],
            extra: []
        );

        $lineFormatter = new LineFormatter();
        $expected = '```' . PHP_EOL . $lineFormatter->format($record) . PHP_EOL . '```';

        $formatter = new MessageFormatter();
        $this->assertSame($expected, $formatter->format($record));
    }
}
