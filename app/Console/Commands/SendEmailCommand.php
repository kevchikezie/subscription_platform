<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Events\PostPublished;
use Illuminate\Console\Command;

class SendEmailCommand extends Command
{
    protected $signature = 'emails:send {postId}';   //php artisan emails:send

    protected $description = 'Sending emails to the users.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $postId = $this->argument('postId');

        $post = Post::find($postId);

        if ($post) {
            event(new PostPublished($post));

            $this->info('The emails queued for sending!');
        } else {
            $this->info('Post does not exist!');
        }

    }
}