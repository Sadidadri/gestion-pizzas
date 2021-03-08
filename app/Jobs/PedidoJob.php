<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\PedidoMail;
use Illuminate\Support\Facades\Mail;

class PedidoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $contenidoPedido;
    protected $email;
    protected $precio;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($contenidoPedido,$precio,$email)
    {
        $this->contenidoPedido = $contenidoPedido;
        $this->email = $email;
        $this->precio = $precio;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new PedidoMail($this->contenidoPedido,$this->precio);
        Mail::to($this->email)->send($email);
    }
}
