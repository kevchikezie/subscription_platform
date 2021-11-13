<?php

namespace App\Listeners;

use App\Events\PostPublished;
use App\Mail\SubscriptionMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSubscriptionMail
// class SendSubscriptionMail implements ShouldQueue
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
    public function handle($event)
    {
        // \Log::info(['error' => json_encode($event)]);
        // dd('Hello');

        $post = $event->post;
        $subscriptions = $post->website->subscriptions()->get();

        foreach ($subscriptions as $subscription) {
            Mail::to($subscription->email)->send(new SubscriptionMail($post));
        }
    }
}
