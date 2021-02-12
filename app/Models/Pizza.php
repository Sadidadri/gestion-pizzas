<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;
    protected $table = "pizzas";
    public $timestamps = false;

    public function getPrecio($precio) {
        return round($precio, 2);
    }
}


