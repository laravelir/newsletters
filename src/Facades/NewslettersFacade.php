<?php

namespace Laravelir\Newsletters\Facades;

use Illuminate\Support\Facades\Facade;

class NewslettersFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'newsletters';
    }
}
