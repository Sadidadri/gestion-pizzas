<?php

namespace Database\Seeders;
use Carbon\Carbon;

use App\Models\Pedido;
use Illuminate\Database\Seeder;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Insertamos Pedidos de ejemplo
        $pedido = new Pedido();
        $pedido->id_usuario = 1;
        $pedido->precio_final = 18.50;
        $pedido->created_at = $current_date_time = Carbon::now()->toDateTimeString(); 
        $pedido->updated_at = $current_date_time = Carbon::now()->toDateTimeString(); 
        $pedido->save();

        $pedido = new Pedido();
        $pedido->id_usuario = 2;
        $pedido->precio_final = 14;
        $pedido->created_at = $current_date_time = Carbon::now()->toDateTimeString(); 
        $pedido->updated_at = $current_date_time = Carbon::now()->toDateTimeString(); 
        $pedido->save();

        $pedido = new Pedido();
        $pedido->id_usuario = 3;
        $pedido->precio_final = 15;
        $pedido->created_at = $current_date_time = Carbon::now()->toDateTimeString(); 
        $pedido->updated_at = $current_date_time = Carbon::now()->toDateTimeString(); 
        $pedido->save();

        $pedido = new Pedido();
        $pedido->id_usuario = 1;
        $pedido->precio_final = 9.50;
        $pedido->created_at = $current_date_time = Carbon::now()->toDateTimeString(); 
        $pedido->updated_at = $current_date_time = Carbon::now()->toDateTimeString(); 
        $pedido->save();
    }
}
