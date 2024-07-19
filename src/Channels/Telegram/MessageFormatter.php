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
