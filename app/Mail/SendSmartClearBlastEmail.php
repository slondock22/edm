<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSmartClearBlastEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $content;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@edi-indonesia.co.id','PT EDI INDONESIA')
                    ->subject('SMART CLEAR INDONESIA - PT EDI INDONESIA')
                    ->view('mail.smart_clear')
                    ->with(['content', $this->content]);
    }
}
