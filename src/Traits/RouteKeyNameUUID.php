<?php

namespace Laravelir\Newsletters\Traits;

trait RouteKeyNameUUID
{
    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
