<?php

namespace Laravelir\Newsletters\Models;

use Illuminate\Database\Eloquent\Model;
use Laravelir\Newsletters\Traits\HasUUID;
use Laravelir\Newsletters\Traits\RouteKeyNameUUID;

class Newsletters extends Model
{
    use HasUUID,
        RouteKeyNameUUID;

    protected $table = 'newsletters';

    // protected $fillable = ['name'];

    protected $guarded = [];

    protected $dates = ['sent_at', 'failed_at'];

}
