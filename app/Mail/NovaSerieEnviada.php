<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NovaSerieEnviada extends Mailable
{
    use Queueable, SerializesModels;

    public $nome;
    public $temporadas;
    public $episodios;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nome,$episodios,$temporadas)
    {
        $this->nome = $nome;
        $this->temporadas = $temporadas;
        $this->episodios = $episodios;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.serie.nova-serie');
    }
}
