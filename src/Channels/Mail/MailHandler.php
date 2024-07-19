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

namespace ConfettiCode\Laravel\Log\Channels\Mail;

use Illuminate\Contracts\Mail\Mailer;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Level;
use Monolog\LogRecord;

class MailHandler extends AbstractProcessingHandler
{
    protected Mailer $mailer;
    protected string $fromAddress;
    protected string $toAddress;

    public function __construct(Mailer $mailer, array $config = [], $level = Level::Debug, bool $bubble = true)
    {
        $this->mailer = $mailer;

        $this->fromAddress = $config['from'];
        $this->toAddress = $config['to'];

        parent::__construct($level, $bubble);
    }

    protected function write(LogRecord $record): void
    {
        $message = $this->formatter->format($record);
        $this->mailer->raw($message, function ($message) use ($record) {
            $message->subject($record->message);
            $message->from($this->fromAddress);
            $message->to($this->toAddress);
        });
    }
}
