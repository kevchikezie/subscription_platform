<?php

namespace App\Listeners;

use App\Events\PostPublished;
use App\Mail\SubscriptionMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
     * @param  App\Events\PostPublished  $event
     * @return void
     */
    public function handle(PostPublished $event)
    {
        $post = $event->post;
        
        $post->website->subscriptions()->chunk(10, function ($subscriptions) use ($post) {
            foreach ($subscriptions as $subscription) {
                Mail::to($subscription->email)->send(new SubscriptionMail($post));
            }
        });

        

    }
}
