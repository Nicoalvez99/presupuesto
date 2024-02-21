<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Records extends Model
{
    protected $fillable = ['user_name', 'descripcion', 'user_key', 'monto', 'tipoDeMovimiento'];
    use HasFactory;
}
