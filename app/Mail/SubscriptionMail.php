<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscriptionMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Post object
     *  
     * @var App\Models\Post
     */
    public $post;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.subscription')
                    ->with([
                        'title' => $this->post->title,
                        'description' => $this->post->description,
                    ]);
    }

}
