<?php

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
