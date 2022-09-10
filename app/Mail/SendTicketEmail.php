<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTicketEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $content;
    public $path;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $content)
    {
        $this->content = $content;  
        $this->path = storage_path('app/public/ticket');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $filename = 'Ticket-'.$this->content['id'].'.pdf';
        // $filename = 'Ticket.pdf';

        $pdf = $this->path . '/' . $filename;

        return $this->from('noreply@edi-indonesia.co.id','PT.EDI INDONESIA')
                    ->subject('Ticket Coffee Morning IT Inventory Invent2 2019')
                    ->view('mail.confirmation')
                    ->attach($pdf, [
                        'as' => 'Ticket Coffee Morning EDII 2019.pdf',
                        'mime' => 'application/pdf',
                    ])
                    ->with(['content', $this->content]);
    }
}
