<?php

namespace ConfettiCode\Laralog\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class LaralogCommand extends Command
{
    protected $signature = 'laralog
        {--channel= : The log channel}
        {--message= : The log message}';

    protected $description = 'Test a specific log channel';

    public function handle()
    {
        $channel = $this->option('channel');
        $message = $this->option('message');

        $config = Config::get("logging.channels.$channel");

        if (is_null($config)) {
            throw new \InvalidArgumentException("Channel [$channel] is not configured.");
        }

        Log::{$config['level']}($message);
    }
}
