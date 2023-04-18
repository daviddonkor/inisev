<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SubscriberEmail extends Mailable
{
    use Queueable, SerializesModels;
    protected $posts;
    /**
     * Create a new message instance.
     */
    public function __construct($data=array())
    {
        $this->posts = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from($this->posts['from'])
                    ->subject('Your New Posts')
                    ->view('postemail')
                    ->with('posts', $this->posts['posts']);

          // flush session data
         // Session::forget('data');
    }
}
