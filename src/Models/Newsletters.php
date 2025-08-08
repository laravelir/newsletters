<?php

namespace Laravelir\Newsletters\Models;

use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;

class Newsletters extends Model
{
    protected $table = 'newsletters';

    // protected $fillable = ['email', 'uuid', 'deleted_at'];

    protected $guarded = [];

    protected $dates = ['sent_at', 'failed_at'];

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->uuid = (string)Uuid::generate(4);
        });
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
