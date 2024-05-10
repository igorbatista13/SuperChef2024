<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReciboCriado extends Mailable
{
    use Queueable, SerializesModels;

    public $recibo;
    public $dadosFormulario;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($recibo, $dadosFormulario)
    {
        $this->recibo = $recibo;
        $this->dadosFormulario = $dadosFormulario;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Recibo Criado',
        );
    }

    public function build()
    {
        return $this->view('emails.recibo_criado')
                    ->subject('Confirmação de Inscrição');
    }
    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.recibo_criado',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}


