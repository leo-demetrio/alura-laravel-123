<?php

namespace App\Listeners;

use App\Events\NovaSerie;
use App\Mail\NovaSerieEnviada;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class EnviarEmailSerieCadastrada
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NovaSerie  $event
     * @return void
     */
    public function handle(NovaSerie $event)
    {
        $nomeSerie = $event->nomeSerie;
        $qtdTemporadas = $event->qtdTemporadas;
        $qtdEpisodios = $event->qtdEpisodios;

        $users = User::all();
        foreach($users as $indice => $user) {
           $multi = $indice + 1;
            $email = new NovaSerieEnviada($nomeSerie ,$qtdTemporadas,$qtdEpisodios);
            $email->subject = 'Nova Série Criada';
            $when = now()->addSeconds($multi * 10); 
            Mail::to($user)->later($when,$email);
         
       }
    }
}
