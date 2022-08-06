<?php

namespace ConfettiCode\Laravel\Logging\Channels\Mail;

use Monolog\Formatter\LineFormatter;

class MessageFormatter extends LineFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(array $record): string
    {
        $message = parent::format($record);
        $title = $record['message'];
        // no indentation
        return <<<END
    <h1>$title</h1>
    <code>$message</code>
END;
    }
}
