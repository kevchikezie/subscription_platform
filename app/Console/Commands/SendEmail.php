<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Command
{
    protected $signature = 'emails:send';

    protected $description = 'Sending emails to the users.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $data = [
            'title' => 'This is the title of ths article',
            'description' => 'This is the description of the article',
        ];

        Mail::send('emails.subscription', $data, function ($message) {
            $message->to('xxx@gmail.com')->subject('New Article Published');
        });

        $this->info('The emails are send successfully!');
    }
}