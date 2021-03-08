<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PedidoMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $contenidoPedido;
    protected $precio;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contenidoPedido,$precio)
    {
        $this->contenidoPedido = $contenidoPedido;
        $this->precio = $precio;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('rollpizzas.adri@gmail.com','Equipo RolPizza')
                    ->subject('Su pedido con RolPizza')
                    ->view('send_pedido_mail')
                    ->with([
                        'contenidoPedido'=> $this->contenidoPedido,
                        'precio' => $this->precio
                    ]);
    }
}
