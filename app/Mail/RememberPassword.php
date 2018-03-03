<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Clientes;

class RememberPassword extends Mailable
{
    use Queueable, SerializesModels;

    protected $cliente;
    protected $senha;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Clientes $cliente, $senha)
    {
        $this->cliente = $cliente;
        $this->senha = $senha;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.clients.remember')
                    ->subject('Gift4US | Recuperação de senha')
                    ->with([
                        'cliente' => $this->cliente,
                        'senha' => $this->senha
                    ]);
    }
}
