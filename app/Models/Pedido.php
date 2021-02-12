<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $table = "pedidos";

    /*
     *  Modificamos el nombre de los campos 'updated at' y 'created_at' 
     */
    //const CREATED_AT = 'fecha_creacion';
    //const UPDATED_AT = 'fecha_modificacion';
}
