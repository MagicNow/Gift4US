<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Festas;

class InviteSend extends Mailable
{
    use Queueable, SerializesModels;

    protected $festa;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Festas $festa)
    {
        $this->festa = $festa;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $festa = $this->festa->id;
        return $this->view('emails.invite.send')
                    ->with('festa');
    }
}
