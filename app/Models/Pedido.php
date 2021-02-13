<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $table = "pedidos";

    protected $fillable = ['id_usuario','precio_final'];

    public function getPrecioFinal($precio) {
        return round($precio, 2);
    }
}
