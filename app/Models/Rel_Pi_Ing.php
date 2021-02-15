<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rel_Pi_Ing extends Model
{
    use HasFactory;

    protected $table = "rel__pi__ings";
    protected $fillable = ['id_pizza','id_ingrediente'];
    public $timestamps = false;
}
