<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rel_Pe_Piz extends Model
{
    use HasFactory;
    
    protected $table = "rel__pe__pizs";
    protected $fillable = ['id_pedido','id_pizza','cantidad','tamagno','tipo_masa'];
    public $timestamps = false;
}
