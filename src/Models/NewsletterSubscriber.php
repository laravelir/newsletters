<?php

namespace Laravelir\Newsletters\Models;

use Illuminate\Database\Eloquent\Model;
use Laravelir\Newsletters\Traits\HasUUID;
use Laravelir\Newsletters\Traits\RouteKeyNameUUID;

class NewsletterSubscriber extends Model
{
    use HasUUID,
        RouteKeyNameUUID;

    protected $table = 'newsletter_subscribers';

    // protected $fillable = ['name'];

    protected $guarded = [];
}
