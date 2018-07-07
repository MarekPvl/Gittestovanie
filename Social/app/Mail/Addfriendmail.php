<?php

namespace App\Mail;

use App\Addfriend;
use User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Addfriendmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $addfrienddata;
    public function __construct(Addfriend $addfrienddata)
    {
        $this->addfrienddata = $addfrienddata;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
	    return $this->markdown('emails.addfriend');
    }
}
