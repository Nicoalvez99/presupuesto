<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ahorros extends Model
{
    protected $fillable = ['monto', 'user_key'];
    use HasFactory;
}
