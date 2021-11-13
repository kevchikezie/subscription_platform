<?php

namespace App\Listeners;

use App\Mail\SubscriptionMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\PostPublished;

class SendSubscriptionMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(PostPublished $event)
    {
        $post = $event->post;
        $subscriptions = $post->website->subscriptions()->get();

        foreach ($subscriptions as $subscription) {
            Mail::to($subscription->email)->send(new SubscriptionMail($post));
        }
    }
}
