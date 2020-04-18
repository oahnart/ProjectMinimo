<?php

namespace App\Jobs;

use App\Post;
use http\Env\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendPostEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $post;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        //
        $this->post = $post;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $data = array(
           'email'=> $this->post->email
        );
        Mail::send('blanks',$data,
            function ($message) {
                $message->from(env('MAIL_USERNAME'), 'Trần Hào');
                $message->to('tranhao491999@gmail.com');
                $message->subject('đây là mail trần hào');
            });
    }
}
