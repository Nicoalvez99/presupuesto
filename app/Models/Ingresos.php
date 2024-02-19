<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingresos extends Model
{
    protected $fillable = ['user_id', 'descripcion', 'monto', 'gasto', 'tipoDeIngreso', 'user_key'];
    use HasFactory;
}
