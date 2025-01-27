<?php

namespace Laravelir\Newsletters\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Api\V1\ApiBaseController;
use Laravelir\Newsletters\Models\NewsletterSubscriber;

class NewslettersController extends ApiBaseController
{
    // crud

    public function send(Request $request)
    {
        //
    }
}
