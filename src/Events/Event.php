<?php

namespace Laravelir\Newsletters\Events;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;


abstract class Event implements ShouldQueue
{
    use Dispatchable,
        SerializesModels;

    protected $loggerService;

    public function __construct()
    {
        $this->loggerService = resolve(LoggerService::class);
    }
}
