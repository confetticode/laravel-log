<?php

namespace ConfettiCode\Laravel\Logging\Channels\Mail;

use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Mail\Message;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;

class MailHandler extends AbstractProcessingHandler
{
    protected Mailer $mailer;
    protected string $fromAddress;
    protected string $toAddress;

    public function __construct(Mailer $mailer, array $config = [], $level = Logger::DEBUG, bool $bubble = true)
    {
        $this->mailer = $mailer;

        $this->fromAddress = $config['from'];
        $this->toAddress = $config['to'];

        parent::__construct($level, $bubble);
    }

    protected function write(array $record): void
    {
        $message = $this->formatter->format($record);
        $this->mailer->raw($message, function (Message $message) {
            $message->from($this->fromAddress);
            $message->to($this->toAddress);
        });
    }
}
