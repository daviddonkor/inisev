<?php

namespace App\Mail;

use Faker\Provider\ar_EG\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address as MailablesAddress;
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

    public function envelope():Envelope
    {
        return new Envelope(
            from: new MailablesAddress('info@inisev.com','Inisev'),
            subject:'Amazing Post now available to you',
        );
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function content(): Content
    {

        return new Content(
                view:'postemail',
                with:['post' => $this->posts]

            
        );
       

          // flush session data
         // Session::forget('data');
    }
}
