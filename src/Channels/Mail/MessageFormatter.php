<?php

namespace ConfettiCode\Laravel\Logging\Channels\Mail;

use Monolog\Formatter\LineFormatter;
use Monolog\LogRecord;

class MessageFormatter extends LineFormatter
{
    public function format(LogRecord $record): string
    {
        $title = $record->message;
        $body = parent::format($record);
        // no indentation
        return <<<END
    <div class="log">
        <h1>$title</h1>
        <code>$body</code>
    </div>
END;
    }
}
