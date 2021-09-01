<?php

use ConfettiCode\Laralog\Channels\Telegram\MessageFormatter;
use Monolog\DateTimeImmutable;
use Monolog\Formatter\LineFormatter;
use Monolog\Logger;

test('Format a telegram log message', function () {
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

    expect($formatter->format($record))->toBe($expected);
});
