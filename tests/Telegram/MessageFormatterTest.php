<?php

namespace Tests\ConfettiCode\Monolog;

use ConfettiCode\Laralog\Telegram\MessageFormatter;
use Monolog\DateTimeImmutable;
use Monolog\Formatter\LineFormatter;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

class MessageFormatterTest extends TestCase
{
    private array $record;

    protected function setUp(): void
    {
        parent::setUp();

        $this->record = [
            'message' => 'Just for test',
            'level' => Logger::INFO,
            'level_name' => Logger::getLevelName(Logger::INFO),
            'context' => [],
            'chat' => 'test',
            'datetime' => new DateTimeImmutable(false),
            'extra' => [],
        ];
    }

    public function testFormatMethod()
    {
        $record = $this->record;

        $lineFormatter = new LineFormatter();

        $formatter = new MessageFormatter();

        $message = '```' . PHP_EOL . $lineFormatter->format($record) . PHP_EOL . '```';

        $this->assertEquals($message, $formatter->format($record));
    }
}
