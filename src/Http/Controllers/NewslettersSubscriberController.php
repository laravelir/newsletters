<?php

namespace Laravelir\Newsletters\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Api\V1\ApiBaseController;
use Laravelir\Newsletters\Models\NewsletterSubscriber;

class NewslettersSubscriberController extends ApiBaseController
{
    public function subscribe(Request $request)
    {
        $data = $request->validate(['email' => 'required|email|unique:newsletter_subscribers,email']);

        $existingSubscription = NewsletterSubscriber::withTrashed()->whereEmail($data['email'])->first();

        if ($existingSubscription) {
            if ($existingSubscription->trashed()) {
                $existingSubscription->restore();
            }
        } else {
            $subscription = NewsletterSubscriber::create(['email' => $data['email']]);
        }

        return Response::back('با موفقیت عضو سیستم خبرنامه شدید', 'success');
    }

    public function unsubscribe(Request $request)
    {
        $data = $request->validate(['email' => 'required|email"unique:newsletter_subscribers,email']);

        $existingSubscription = NewsletterSubscriber::whereEmail($data['email'])->first();

        if ($existingSubscription) {
            $existingSubscription->delete();
        }

        return Response::back('با موفقیت از عضویت سیستم خبرنامه خارج شدید.', 'success');
    }

    public function toggleSubscribe(Request $request)
    {
        //
    }

    public function send(Request $request)
    {
        //
    }
}
