<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CampaignMail extends Mailable
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
        return $this->from('noreply@edi-indonesia.co.id','PT Electronic Data Interchange Indonesia')
                    ->subject($this->content['subject'])
                    ->view('mail.campaign_mail_backup')
                    ->with(['content', $this->content]);

        // //Cara 1
        // $this->AddCustomHeader( 'X-pmrqc: 1' );
        // $this->AddCustomHeader( "X-Confirm-Reading-To: airlangga.pasmika@edi-indonesia.co.id" );

        // //Cara 2
        // $this->AddCustomHeader( "Return-receipt-to: airlangga.pasmika@edi-indonesia.co.id" );

        // //Cara 3
        // $this->AddCustomHeader( "Disposition-Notification-To:<airlangga.pasmika@edi-indonesia.co.id>");

        // //Cara 4
        // $this->ConfirmReadingTo = "airlangga.pasmika@edi-indonesia.co.id";
    }
}
