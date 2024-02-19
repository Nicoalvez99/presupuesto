<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $fillable = ['id_user', 'nombre', 'key', 'id_user_dos'];
    use HasFactory;
}
