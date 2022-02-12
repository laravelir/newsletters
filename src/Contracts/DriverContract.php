<?php

namespace Laravelir\Newsletters\Contracts;

interface DriverContract
{
    public function subscribe();

    public function unsubscribe();

    public function toggleSubscribe();

    public function deleteSubscriber();

    public function send();
}
