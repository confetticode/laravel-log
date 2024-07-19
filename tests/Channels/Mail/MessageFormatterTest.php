<?php

declare(strict_types=1);

/*
 * This file is part of the ConfettiCode project.
 *
 * (c) ConfettiCode
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Channels\Mail;

use ConfettiCode\Laravel\Log\Channels\Mail\MessageFormatter;
use Monolog\DateTimeImmutable;
use Monolog\Formatter\LineFormatter;
use Monolog\Level;
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
            message: 'Test mail MessageFormatter',
            context: [],
            extra: []
        );

        $lineFormatter = new LineFormatter();

        $formatter = new MessageFormatter();
        $mailContent = $formatter->format($record);
        $title = $record->message;
        $body = $lineFormatter->format($record);
        $this->assertStringContainsString('<h1>'.$title.'</h1>', $mailContent);
        $this->assertStringContainsString('<code>'.$body.'</code>', $mailContent);
    }
}
